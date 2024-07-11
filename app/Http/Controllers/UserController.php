<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Account;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Borrow;
use App\Mail\NewOrder;
use App\Mail\UploadBorrow;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function home()
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        $userId = session('user_id');
        $account = Account::find($userId);

        $product = Product::all();
        $category = Category::all();

        return view('user.home', [
            'product' => $product,
            'category' => $category,
            'account' => $account
        ]);
    }

    public function product_details($id)
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }
        
        $product = Product::findOrFail($id);
        $products = Product::all();
        $category = Category::all();

        return view('user.single_product', compact('product', 'products', 'category'));
    }

    public function addToCart(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'product_id' => 'required|integer|exists:products,id',
            ]);

            $userId = session('user_id');

            $cartItem = Cart::where('user_fk_id', $userId)
                            ->where('fk_product_id', $request->input('product_id'))
                            ->first();

            if ($cartItem) {
                $cartItem->increment('cart_qty');
            } else {
                $cartItem = Cart::create([
                    'user_fk_id' => $userId,
                    'fk_product_id' => $request->input('product_id'),
                    'cart_qty' => 1, 
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!',
                'cart_item' => $cartItem,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid request method.',
        ]);
    }

    public function cart()
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }
        
        $user_id = session('user_id');
        $cartItems = Cart::where('user_fk_id', $user_id)
        ->where('status', 'pending')
        ->get();

        $products = Product::whereIn('id', $cartItems->pluck('fk_product_id'))->get();

        return view('user.cart', [
            'cartItems' => $cartItems,
            'products' => $products,
        ]);
    }


    public function cart_update(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|integer',
            'new_qty' => 'required|integer|min:1', // Adjust validation rules as needed
        ]);

        $cart = Cart::findOrFail($request->cart_id);
        $cart->cart_qty = $request->new_qty;
        $cart->save();

        $product = Product::findOrFail($cart->fk_product_id);

        return response()->json(['product_price' => $product->product_price]);
    }

    public function cart_remove(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|integer',
        ]);

        Cart::destroy($request->cart_id);

        return response()->json(['message' => 'Item removed from cart successfully']);
    }

    public function checkout($user_id)
    {
        $user = Account::find($user_id);
        if (!$user) {
            return redirect('/')->with('error', 'User not found');
        }

        $cartItems = Cart::where('user_fk_id', $user_id)->get();

        $productIds = $cartItems->pluck('fk_product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get();

        return view('user.check_out', [
            'user_id' => $user_id,
            'cartItems' => $cartItems,
            'products' => $products,
            'user' => $user
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'others' => 'nullable|string',
        ]);

        $user = auth()->user();
        if (!$user) {
            return redirect('/')->with('error', 'User not found');
        }

        $cartItems = Cart::where('user_fk_id', $user->id)->get();
        $productIds = $cartItems->pluck('fk_product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get();
        $orderTotal = $cartItems->sum(function($cartItem) use ($products) {
            return $cartItem->cart_qty * $products->where('id', $cartItem->fk_product_id)->first()->product_price;
        });

        $order = new Order();
        $order->fullname = $user->firstname . ' ' . $user->lastname;
        $order->email = $user->email;
        $order->phone_no = $user->phone_no;
        $order->others = $request->input('others') ?? '';
        $order->order_status = 'Pending';
        $order->order_total = $orderTotal;
        $order->user_fk_id = $user->id;
        $order->order_id = $this->generateOrderId();
        $order->save();

        foreach ($cartItems as $cartItem) {
            $product = $products->where('id', $cartItem->fk_product_id)->first();
            $productTotal = $cartItem->cart_qty * $product->product_price;

            if ($product->stocks >= $cartItem->cart_qty) {
                $product->stocks -= $cartItem->cart_qty;
                $product->save();
            } else {
                return redirect('/')->with('error', 'Not enough stock for product: ' . $product->name);
            }

            $orderItem = new Order_Item();
            $orderItem->order_fk_id = $order->id; 
            $orderItem->product_fk_id = $product->id;
            $orderItem->quantity = $cartItem->cart_qty;
            $orderItem->product_price = $product->product_price;
            $orderItem->save();
        }

        Cart::where('user_fk_id', $user->id)->update(['status' => 'placed']);

        Mail::to('carlosbernales24@gmail.com')->send(new NewOrder);

        return redirect('/')->with('success', 'Order placed successfully!');
    }


    public function upload_borrow(Request $request)
    {
        $request->validate([
            'speed_test' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000', 
        ]);

        if ($request->hasFile('speed_test')) {
            $image = $request->file('speed_test');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension(); 
            $image->move(public_path('speed_test'), $imageName);

            Borrow::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'user_fk_id' => $request->user_fk_id, 
                'contact' => $request->contact,
                'speed_test' => $imageName,
                'deadline' => $request->deadline ?? null,
                'product_fk_id' => $request->product_fk_id, 
                'borrow_id' => $this->generateBorrowId(),
            ]);

            Mail::to('sarahelmenzo13@gmail.com')->send(new UploadBorrow);

            return redirect()->back()->with('success', 'Borrow added successfully.');
        }

        return redirect()->back()->with('error', 'Failed to add product. Please upload a valid image.');
    }

    private function generateBorrowId()
    {
        return strtoupper(Str::random(15));
    }

    private function generateOrderId()
    {
        return strtoupper(Str::random(11));
    }


    



}

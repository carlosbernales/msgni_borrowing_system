<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;


class UserController extends Controller
{

    public function home()
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }
        $product = Product::all();
        $category = Category::all();
    
        return view('user.home', 
            ['product' => $product],
            ['category' => $category]);
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
        $cartItems = Cart::where('user_fk_id', $user_id)->get();

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

    public function check_out()
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }
        $product = Product::all();
        $category = Category::all();
    
        return view('user.check_out', 
            ['product' => $product],
            ['category' => $category]);
    }






}

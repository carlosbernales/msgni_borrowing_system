<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{

    public function dashboard()
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        return view('admin.dashboard');
    }

    public function category()
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        $categories = Category::all();
    
        return view('admin.category', ['categories' => $categories]);
    }

    public function add_category(Request $request)
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }

        $category = new Category();
        $category->cat_name = $request->input('cat_name');
        $category->save(); 

        return redirect()->back()->with('success', 'Category added successfully');
    }

    public function category_edit(Request $request, $id)
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }

        $category = Category::findOrFail($id);

        $category->update([
            'cat_name' => $request->input('cat_name'),
        ]);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    public function products()
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        $product = Product::all();
        $category = Category::all();
    
        return view('admin.product', ['product' => $product, 'category' => $category]);
    }
    
    public function add_product(Request $request)
    {
        $request->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000', 
        ]);

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension(); 
            $image->move(public_path('product_images'), $imageName);

            $category = Category::findOrFail($request->cat_fk_id);

            Product::create([
                'product_name' => $request->product_name,
                'cat_name' => $category->cat_name, 
                'cat_fk_id' => $request->cat_fk_id, 
                'product_price' => $request->product_price,
                'product_desc' => $request->product_desc,
                'stocks' => $request->stocks,
                'stock_price' => $request->stock_price,
                'product_image' => $imageName,
            ]);

            return redirect()->back()->with('success', 'Product added successfully.');
        }

        return redirect()->back()->with('error', 'Failed to add product. Please upload a valid image.');
    }


    public function edit_product(Request $request, $id)
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }

        $products = Product::findOrFail($id);

        $oldImage = $products->product_image;

        if ($request->hasFile('product_image')) {
            // Validate and upload new image
            $image = $request->file('product_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension(); 
            $image->move(public_path('product_images'), $imageName);

            if ($oldImage && $oldImage !== $imageName && file_exists(public_path('product_images/' . $oldImage))) {
                unlink(public_path('product_images/' . $oldImage));
            }
            $category = Category::findOrFail($request->cat_fk_id);

            $products->update([
                'product_name' => $request->product_name,
                'cat_name' => $category->cat_name, 
                'cat_fk_id' => $request->cat_fk_id, 
                'product_price' => $request->product_price,
                'product_desc' => $request->product_desc,
                'status' => $request->status,
                'stocks' => $products->stocks + $request->stocks,
                'stock_price' => $request->stock_price,
                'product_image' => $imageName,
            ]);
        } else {
            $category = Category::findOrFail($request->cat_fk_id);
            $products->update([
                'product_name' => $request->product_name,
                'cat_name' => $category->cat_name, 
                'cat_fk_id' => $request->cat_fk_id, 
                'product_price' => $request->product_price,
                'product_desc' => $request->product_desc,
                'status' => $request->status,
                'stocks' => $products->stocks + $request->stocks,
                'stock_price' => $request->stock_price,
            ]);
        }

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function borrowed()
    {
        if (!session()->has('admin_id')) {
            return redirect('/');
        }
        // $categories = Category::all();
    
        // return view('admin.category', ['categories' => $categories]);
        return view('admin.borrowed');

    }


    



}

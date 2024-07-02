<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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

   
    
    
}

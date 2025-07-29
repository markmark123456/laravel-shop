<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function showProducts()
    {
        $products = Product::with('category')->paginate(10);
        return view('products', compact('products'));
    }

    public function showProduct($code)
    {
        $product = Product::with('category')->where('code', $code)->firstOrFail();
        return view('product', compact('product'));
    }
}








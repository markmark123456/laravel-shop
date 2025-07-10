<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.create_product', compact('categories'));
    }

   /**
    * @param \Illuminate\Http\Request $request
    */

    public function store(StoreProductRequest $request)
    {
        $data = $request->only(['name', 'code', 'price', 'in_stock', 'description', 'category_id']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('products')->with('success', 'Товар добавлен');
    }
}

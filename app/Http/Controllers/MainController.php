<?php

namespace App\Http\Controllers;

use App\Models\Category;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->firstOrFail();
        return view('category', compact('category'));
    }
}


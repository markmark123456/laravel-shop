<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function index()
    {
        $orders = Order::where('status', 1)->get();
        return view('orders.index', compact('orders'));
    }
}
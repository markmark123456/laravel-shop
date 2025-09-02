<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
     public function index()
    {
        $orders = Order::where('status', 1)->get();
        return view('orders', compact('orders'));
    }
}
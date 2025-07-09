<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->orderBy('created_at', 'desc')->get();
        return view('orders', compact('orders'));
    }

    public function create()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }
        return view('order', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'total_price' => $totalPrice,
        ]);

        $products = [];
        foreach ($cart as $productId => $item) {
            $products[$productId] = [
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ];
        }

        $order->products()->sync($products);

        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Заказ успешно оформлен!');
    }
}

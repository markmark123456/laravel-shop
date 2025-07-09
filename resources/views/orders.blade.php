@extends('layouts.app')

@section('title', 'Список заказов')

<h2>Список заказов</h2>

@if($orders->isEmpty())
    <p>Заказов нет.</p>
@else
    @foreach($orders as $order)
        <div style="border: 1px solid #ccc; margin-bottom: 20px; padding: 10px;">
            <h3>Заказ #{{ $order->id }} — {{ $order->created_at->format('d.m.Y H:i') }}</h3>
            <p><strong>Имя:</strong> {{ $order->customer_name }}</p>
            <p><strong>Email:</strong> {{ $order->customer_email }}</p>
            <p><strong>Телефон:</strong> {{ $order->customer_phone ?? '-' }}</p>
            <p><strong>Адрес:</strong> {{ $order->address ?? '-' }}</p>
            <p><strong>Итог:</strong> {{ number_format($order->total_price, 2, ',', ' ') }} ₽</p>

            <h4>Товары:</h4>
            <ul>
                @foreach($order->products as $product)
                    <li>
                        {{ $product->name }} — {{ number_format($product->pivot->price, 2, ',', ' ') }} ₽ × {{ $product->pivot->quantity }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif

@extends('layouts.app')

@section('title', 'Корзина')

@section('content')

<h2>Корзина</h2>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<ul>
    @forelse($cart as $id => $item)
        <li>
            <img src="{{ $item['image'] }}" alt="" width="50">
            {{ $item['name'] }} — {{ $item['price'] }} * {{ $item['quantity'] }}
            
            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">Удалить</button>
            </form>
        </li>
    @empty
        <li>Корзина пуста</li>
    @endforelse
</ul>

@if(count($cart) > 0)
    <a href="{{ route('order.create') }}">Оформить заказ</a>
@endif

@endsection
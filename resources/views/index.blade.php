@extends('layouts.app')

@section('title', 'Главная')

@section('content')

@auth
    <p>Вы вошли как {{ Auth::user()->name }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Выйти</button>
    </form>


<a href="{{ route('cart.index') }}">Корзина</a>
{{-- <a href="{{ route('orders.index') }}">Мои заказы</a> --}}


@endauth

@guest
    <a href="{{ route('login') }}">Войти</a>
@endguest

<a href="{{ route('products') }}">Список товаров</a>

@endsection

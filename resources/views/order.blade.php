@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('content')

<h2>Оформление заказа</h2>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('cart.confirm') }}" method="POST">
    <p>Общая стоимость заказа: <b>{{ $order->getFullPrice() }} руб.</b></p>
    <label>Имя:<br>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </label><br><br>

    <label>Email:<br>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </label><br><br>

    <label>Телефон:<br>
        <input type="text" name="phone" value="{{ old('phone') }}">
    </label><br><br>

    <label>Адрес:<br>
        <textarea name="address">{{ old('address') }}</textarea>
    </label><br><br>
    @csrf
    <button type="submit">Оформить заказ</button>
</form>

@endsection

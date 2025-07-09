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

<form action="{{ route('order.store') }}" method="POST">
    @csrf
    <label>Имя:<br>
        <input type="text" name="customer_name" value="{{ old('customer_name') }}" required>
    </label><br><br>

    <label>Email:<br>
        <input type="email" name="customer_email" value="{{ old('customer_email') }}" required>
    </label><br><br>

    <label>Телефон:<br>
        <input type="text" name="customer_phone" value="{{ old('customer_phone') }}">
    </label><br><br>

    <label>Адрес:<br>
        <textarea name="address">{{ old('address') }}</textarea>
    </label><br><br>

    <button type="submit">Оформить заказ</button>
</form>

@endsection

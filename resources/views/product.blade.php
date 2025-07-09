@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <a href="{{ route('products') }}">Назад к списку товаров</a>

    <div class="product-detail">
        <h1>{{ $product->name }}</h1>

        @if($product->category)
            <p><strong>Категория:</strong> {{ $product->category->name }}</p>
        @endif

        @if($product->image)
            <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 300px;">
        @else
            <img src="/images/no-image.png" alt="Нет изображения" style="max-width: 300px;">
        @endif

        @if(!empty($product->description))
            <p>{{ $product->description }}</p>
        @endif

        <p><strong>Цена:</strong> {{ number_format($product->price, 0, ',', ' ') }} ₽</p>
        
        <p><strong>Наличие:</strong>
            @if($product->in_stock)
                <span style="color: green;">В наличии</span>
            @else
                <span style="color: red;">Нет в наличии</span>
            @endif
        </p>

        @if($product->in_stock)
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit">Добавить в корзину</button>
            </form>
        @endif
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Товары')

@section('content')
    <a href="{{ route('admin.products.create') }}">Создать товар...</a>
    <h1>Список товаров</h1>

    @forelse($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p><strong>Категория:</strong> {{ $product->category->name ?? 'Без категории' }}</p>
            @if(!empty($product->description))
                <p>{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
            @endif
            <p>Цена: {{ number_format($product->price, 0, ',', ' ') }} ₽</p>
            <p>В наличии: {{ $product->in_stock ? 'Да' : 'Нет' }}</p>
            <p>
                <a href="{{ route('products.show', ['code' => $product->code]) }}">Подробнее...</a>
            </p>
            
        </div>
        <hr>
    @empty
        <p>Товары не найдены.</p>
    @endforelse

    {{-- Пагинация --}}
    {{ $products->links() }}
@endsection


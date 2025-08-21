@extends('layouts.app')

@section('title', 'Товары')

@section('content')
    <h1>Список товаров</h1>

    @forelse($products as $product)
        @include('layouts.card', compact('product'))
        <hr>
    @empty
        <p>Товары не найдены.</p>
    @endforelse

    {{-- Пагинация --}}
    {{ $products->links() }}
@endsection

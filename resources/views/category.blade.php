@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <h1>{{ $category->name }} {{ $categoty->products->count() }} </h1>
    <p>{{ $category->description }}</p>

    @if($category->products && count($category->products))
        <ul>
            @foreach($category->products as $product)
                <li>{{ $product->name }} - {{ $product->price }}₽</li>
            @endforeach
        </ul>
    @else
        <p>В этой категории пока нет товаров.</p>
    @endif
@endsection

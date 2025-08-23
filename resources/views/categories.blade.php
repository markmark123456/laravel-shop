@extends('layouts.app')

@section('title', 'Категории')

@section('content')

@foreach($categories as $category)
    <div class="panel">
        <a href="{{ route('category'), $categoty->code }}">
            <h2>{{ $category->name }}</h2>
        </a>
        <p>
            {{ $category->desctiption }}
        </p>
        <p><a href="{{ route('category', ['id' => $category->id]) }}">Подробнее...</a></p>
    </div>
    <hr>
@endforeach

@endsection

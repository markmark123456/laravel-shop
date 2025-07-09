@extends('layouts.app')

@section('title', 'Категории')

@section('content')

@foreach($categories as $category)
    <div>
        <h2>{{ $category->name }}</h2>
        <p><a href="{{ route('category', ['code' => $category->code]) }}">Подробнее...</a></p>
    </div>
    <hr>
@endforeach

@endsection

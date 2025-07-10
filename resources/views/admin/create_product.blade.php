@extends('layouts.app')

@section('title', 'Добавить товар')

@section('content')
    <h1>Добавить товар</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Название:</label>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label>Код:</label>
        <input type="text" name="code" value="{{ old('code') }}" required><br><br>

        <label>Цена:</label>
        <input type="number" name="price" value="{{ old('price') }}" required><br><br>

        <label>Описание:</label>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>В наличии:</label>
        <select name="in_stock">
            <option value="1">Да</option>
            <option value="0">Нет</option>
        </select><br><br>

        <label>Изображение:</label>
        <input type="file" name="image"><br><br>

        <button type="submit">Сохранить</button>
    </form>
@endsection

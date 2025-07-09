@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Имя" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="password" name="password_confirmation" placeholder="Повторите пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

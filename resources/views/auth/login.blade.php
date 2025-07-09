@extends('layouts.app')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required autofocus>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Войти</button>
</form>

<a href="{{ route('register') }}">Зарегистрироваться</a>




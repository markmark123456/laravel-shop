<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/product/{code}', [ProductController::class, 'showProduct'])->name('product');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/category/{code}', [MainController::class, 'category'])->name('category');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');


Route::get('/auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');

Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');

Route::post('/auth/logout', [LogoutController::class, 'logout'])->name('logout');
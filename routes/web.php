<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');
Route::get('/categories{id}', [MainController::class, 'category'])->name('category');

// Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');
Route::get('/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/products/{code}', [ProductController::class, 'showProduct'])->name('products.show');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::get('/cart/place', [CartController::class, 'cartPlace'])->name('cart.place');
    Route::post('/cart/add/{product}', [CartController::class, 'cartAdd'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'cartRemove'])->name('cart.remove');
    Route::post('/cart/place', [CartController::class, 'cartConfirm'])->name('cart.confirm');
});

Route::get('/auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');

Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');

Route::post('/auth/logout', [LogoutController::class, 'logout'])->name('logout');

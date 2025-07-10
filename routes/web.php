<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

// ⬇️ Добавь это — импорт админского контроллера с псевдонимом
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// Главная страница
Route::get('/', [MainController::class, 'index'])->name('index');

// Публичные маршруты товаров
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{code}', [ProductController::class, 'show'])->name('products.show');

// Админские маршруты для управления товарами
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    // сюда же можно будет добавить edit, update, destroy
});

// Защищённые маршруты для корзины и заказов
Route::middleware(['auth'])->group(function () {
    // Корзина
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Заказы
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
});

// Аутентификация
Route::get('/auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/auth/register', [RegisterController::class, 'register'])->name('register');

Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login');

Route::post('/auth/logout', [LogoutController::class, 'logout'])->name('logout');

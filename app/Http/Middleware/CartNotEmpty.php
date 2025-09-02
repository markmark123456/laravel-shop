<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $orderId = session('orderId');
        $order = $orderId ? Order::find($orderId) : null;

        if (is_null($order) || $order->products()->count() == 0) {
            session()->flash('warning', 'Ваша корзина пуста!');
            return redirect()->route('index');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use LukePOLO\LaraCart\Facades\LaraCart;

class LoadCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cartItems = LaraCart::getItems();
        view()->share('cartItems', $cartItems);
        return $next($request);
    }
}

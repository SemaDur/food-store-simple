<?php

namespace App\Providers;

use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.navbar', function ($view) {
            $view->with('countActiveOrders', Order::getCountNewOrders())
                ->with('countProductCart', Cart::getCountProductCart());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

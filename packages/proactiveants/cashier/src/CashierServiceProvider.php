<?php

namespace ProactiveAnts\Cashier;

use Illuminate\Support\ServiceProvider;

class CashierServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/cashier.php', 'cashier');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'cashier');
    }
}

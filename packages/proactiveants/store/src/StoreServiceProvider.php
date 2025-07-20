<?php

namespace ProactiveAnts\Store;

use Illuminate\Support\ServiceProvider;

class StoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('ProactiveAnts\Store\CartController');
        $this->app->make('ProactiveAnts\Store\IPGController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/store.php', 'store');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'store');
    }
}

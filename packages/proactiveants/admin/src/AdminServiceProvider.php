<?php

namespace ProactiveAnts\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('ProactiveAnts\Admin\LibraryController');
        $this->app->make('ProactiveAnts\Admin\AdminController');
        $this->app->make('ProactiveAnts\Admin\SeminarController');
        $this->app->make('ProactiveAnts\Admin\LessonController');
        $this->app->make('ProactiveAnts\Admin\VideoController');
        $this->app->make('ProactiveAnts\Admin\OrderController');
        $this->app->make('ProactiveAnts\Admin\SubscriptionController');
        $this->app->make('ProactiveAnts\Admin\LoginController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/admin.php', 'admin');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'admin');
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use ProactiveAnts\Advertisement\Advertisement;
use App\TuitionClass;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        try {
            View::share('advertisement', Advertisement::where('publish',1)->orderBy('position')->get());
            View::share('tuition_classes', TuitionClass::all());
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
}

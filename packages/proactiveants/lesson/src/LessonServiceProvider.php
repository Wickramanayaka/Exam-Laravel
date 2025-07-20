<?php

namespace ProactiveAnts\Lesson;

use Illuminate\Support\ServiceProvider;

class LessonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('ProactiveAnts\Lesson\LessonController');
        $this->app->make('ProactiveAnts\Lesson\VideoController');
        $this->app->make('ProactiveAnts\Lesson\IPGController');
        $this->app->make('ProactiveAnts\Lesson\SubscriptionController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/lesson.php', 'lesson');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'lesson');
    }
}

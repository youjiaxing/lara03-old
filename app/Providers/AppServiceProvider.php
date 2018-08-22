<?php

namespace App\Providers;

use App\Handlers\SlugTranslateHandler;
use App\Models\Topic;
use App\Observers\TopicObserver;
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
        Topic::observe(TopicObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        \Carbon\Carbon::setLocale('zh');

        $this->app->singleton(SlugTranslateHandler::class, function ($app) {
            return new SlugTranslateHandler();
        });
    }
}

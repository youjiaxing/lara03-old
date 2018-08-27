<?php

namespace App\Providers;

use App\Handlers\SlugTranslateHandler;
use App\Models\Reply;
use App\Models\Topic;
use App\Observers\ReplyObserver;
use App\Observers\TopicObserver;
use Illuminate\Support\ServiceProvider;
use VIACreative\SudoSu\SudoSu;

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
        Reply::observe(ReplyObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Carbon\Carbon::setLocale('zh');

        $this->app->singleton(SlugTranslateHandler::class, function ($app) {
            return new SlugTranslateHandler();
        });

        if (app()->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }
}

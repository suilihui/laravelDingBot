<?php

namespace LaravelDingBot\Provider;

use Illuminate\Support\ServiceProvider;
use LaravelDingBot\LaravelDingBot;

class LaravelDingBotProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('dingbot.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        return new LaravelDingBot();
    }
}
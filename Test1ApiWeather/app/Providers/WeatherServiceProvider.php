<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\OpenWeatherClient;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('OpenWeatherClient', function () {
            return new OpenWeatherClient;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

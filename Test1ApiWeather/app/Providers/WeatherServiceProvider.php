<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\DataTransferOpenWeather;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('DataTransferOpenWeather', function () {
            return new DataTransferOpenWeather;
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

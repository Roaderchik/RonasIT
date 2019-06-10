<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\LocateClient;

class LocateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('LocateClient', function () {
            return new LocateClient;
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

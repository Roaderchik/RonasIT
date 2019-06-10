<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class OpenWeatherClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'OpenWeatherClient';
    }
}
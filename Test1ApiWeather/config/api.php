<?php

return [

    /*
    |--------------------------------------------------------------------------
    | WEATHER 
    |--------------------------------------------------------------------------
    */

    'weather_url' => env('WEATHER_URL', 'https://api.openweathermap.org'),
    'weather_appid' => env('WEATHER_appid', 'a4cfee3044d5428481b8297bc76d67f2'),
    
    /*
    |--------------------------------------------------------------------------
    | LOCATE
    |--------------------------------------------------------------------------
    */
    'locate_url' => env('LOCATE_URL', 'https://restcountries.eu'),
];
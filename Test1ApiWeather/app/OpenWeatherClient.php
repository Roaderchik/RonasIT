<?php

namespace App;

class OpenWeatherClient
{
    /**
     * Get Current date Weather City
     *
     * @param  int  $cityId
     * @param  string  $units 
     * @return void
     */
    public function getCurrentWeatherCity($cityId,$units = 'metric')
    {  
        $format = '%s/data/2.5/weather?id=%d&appid=%s&lang=RU&units=%s';
        $url= sprintf($format, config('api.weather_url'), $cityId,config('api.weather_appid'),$units);        
        return json_decode(file_get_contents($url), true);
    }

    /**
     * Get Current date Weather Geo Coordinate
     *
     * @param  float  $lat
     * @param  float  $lon
     * @param  string  $units 
     * @return void
     */
    public function getCurrentWeatherGeoCoor($lat,$lon, $units = 'metric')
    {       
        $format = '%s/data/2.5/weather?lat=%s&lon=%s&appid=%s&lang=RU&units=%s';
        $url= sprintf($format, config('api.weather_url'), $lat,$lon,config('api.weather_appid'),$units);               
        return json_decode(file_get_contents($url), true);       
    }

}

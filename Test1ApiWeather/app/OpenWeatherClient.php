<?php

namespace App;
use Response;

class OpenWeatherClient
{

     /**
     * The units type.
     *
     * @var string
     */
   // protected $appid = 'a4cfee3044d5428481b8297bc76d67f2';
     /**
     * The units type.
     *
     * @var string
     */
  //  protected $units = 'metric';
     /**
     * The CityId default.
     *
     * @var int
     */
    //protected $cityId ;

    /**
     * Dump a value with elegance.
     *
     * @param  mixed  $value
     * @return void
     */
    public function getCurrentWeatherCity($cityId,$units = 'metric')
    {      
        //TODO в конфиг вынести пути https://api.openweathermap.org
        //TODO print_f переделать
        return json_decode(file_get_contents(config('api.weather_url').'/data/2.5/weather?id='.$cityId.'&appid='.config('api.weather_appid').'&lang=RU&units='.$units), true);       
    }

    public function getCurrentWeatherGeoCoor($lat,$lon, $units = 'metric')
    {       
        $appid='a4cfee3044d5428481b8297bc76d67f2';        
        return  json_decode(file_get_contents(config('api.weather_url').'/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&appid='.config('api.weather_appid').'&lang=RU&units='.$units), true);       
    }

}

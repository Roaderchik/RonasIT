<?php

namespace App;
use Response;

class DataTransferOpenWeather
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
    //protected $CityId ;

    /**
     * Dump a value with elegance.
     *
     * @param  mixed  $value
     * @return void
     */
    public function getCurrentWeatherCity($cityId,$units = 'metric')
    {
        $appid='a4cfee3044d5428481b8297bc76d67f2';
        return json_decode(file_get_contents('https://api.openweathermap.org/data/2.5/weather?id='.$cityId.'&appid='.$appid.'&lang=RU&units='.$units), true);       
    }

    public function getCurrentWeatherGeoCoor($lat,$lon, $units = 'metric')
    {       
        $appid='a4cfee3044d5428481b8297bc76d67f2';        
        return  json_decode(file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&appid='.$appid.'&lang=RU&units='.$units), true);       
    }

}

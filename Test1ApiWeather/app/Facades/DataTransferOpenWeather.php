<?php
// app/Facades/DataTransferOpenWeather.php.
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class DataTransferOpenWeather extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'DataTransferOpenWeather';
    }
}
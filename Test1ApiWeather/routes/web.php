<?php
	
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Общий список стран, можно передавать параметр name (Латиницой или кирилицей) для поиска по имени(любое вхождение). 
Route::get('countries', 'LocateController@getListCountries')->name('locate.countries');

//Общий список городов по коду страны, можно передавать параметр name (Латиницой или кирилицей) для поиска по имени( начало вхождения). 
Route::get('countries/{countryCode}/cities', 'LocateController@getListCities')->name('locate.cities')->where(['countryCode' => '[A-Z]+']);;

//Получаем погоду по ИД города, можно передавать параметр unit либо 'metric', 'imperial'
Route::get('weather/city/{cityId}/', 'WeatherController@getCurrentWeatherCity')->name('weather.city')->where(['cityId' => '[0-9]+']);

//Получаем погоду по координатам, можно передавать параметр unit либо 'metric', 'imperial'
Route::get('weather/geo/{lat}/{lon}/', 'WeatherController@getCurrentWeatherGeoCoor')->name('weather.geocoor')->where(['lat' => '[0-9,.]+','lon' => '[0-9,.]+']);


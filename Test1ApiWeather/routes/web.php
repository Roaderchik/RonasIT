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

Route::get('countries', 'LocateContoroller@getListCountries')->name('locate.countries');
Route::get('countries/{countryCode}/cities', 'LocateContoroller@getListCities')->name('locate.cities')->where(['countryCode' => '[A-Z]+']);;


Route::get('weather/city/{cityId}/', 'WeatherContoroller@getCurrentWeatherCity')->name('weather.city')->where(['cityId' => '[0-9]+']);

Route::get('weather/geo/{lat}/{lon}/', 'WeatherContoroller@getCurrentWeatherGeoCoor')->name('weather.geocoor')->where(['lat' => '[0-9,.]+','lon' => '[0-9,.]+']);


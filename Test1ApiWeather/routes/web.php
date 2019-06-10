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




Route::get('getListCity/{CountryCode}/{CitySearch?}', function ($CountryCode,$CitySearch = Null) 
{  
//вот это вообще конечно жесть, в идеале передеалать на отдельный микросервис и получать оттуда уже фильтрованные данные

$path = storage_path() . "/files/city.list.json"; 
$json = json_decode(file_get_contents($path), true); 



	$response=[];
	foreach($json as $key => $search)  {    
	
		if ($search['country']== strtoupper($CountryCode)) {
			if (is_null($CitySearch )) {
				$response[]=$search; 
			} else {
				if ( stripos($search['name'], $CitySearch)   !== false) {
					$response[]=$search;
				}
			}
		}		
    }
	 
	return Response::json($response);
});




Route::get('weather/city/{cityId}/', 'WeatherContoroller@getCurrentWeatherCity')->name('weather.city')->where(['cityId' => '[0-9]+']);

Route::get('weather/geo/{lat}/{lon}/', 'WeatherContoroller@getCurrentWeatherGeoCoor')->name('weather.geocoor')->where(['lat' => '[0-9,.]+','lon' => '[0-9,.]+']);


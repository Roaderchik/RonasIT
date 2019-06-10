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

Route::get('/', function () {
    return view('welcome');
});

Route::get('getListCountry/{CountrySearch?}', function ($CountrySearch = Null) {
    //return 'CountrySearch '.$CountrySearch;
	
	//Если не использовать пакеты типа LaraCurl, Guzzle и т.п. 
	
	
	if (is_null($CountrySearch )) {
		//Если нет уточняющих данных передаем все старны
		$json = json_decode(file_get_contents('https://restcountries.eu/rest/v2/all'), true);
	} else {
		//Передаюм только содержащие буквы 
		$json = json_decode(file_get_contents('https://restcountries.eu/rest/v2/name/'.$CountrySearch), true);
	}
	
	//Очищаем от лишних данных
	$response=[];
	foreach($json as $key => $search)  {      				
		$response[]=array('country_code' => $search['alpha2Code'], 'name' => $search['name'], 'name_local'=> $search['nativeName']);         
	} 
	 	
	$headers = ['Content-type'=> 'application/json; charset=utf-8'];
    return Response::json($response, 200, $headers, JSON_UNESCAPED_UNICODE);
	
});

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

Route::get('getCurrentWeatherGeoCoor/{Lat}/{Lon}/{Units?}', function ($Lon,$Lat,$Units = 'metric') 
{   
//appid переделать на получение из конфига
$appid='a4cfee3044d5428481b8297bc76d67f2';

	$json = json_decode(file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat='.$Lat.'&lon='.$Lon.'&appid='.$appid.'&lang=RU&units='.$Units), true);
	return $json;
	
});

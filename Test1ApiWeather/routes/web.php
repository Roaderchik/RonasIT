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
	
	return Response::json($response);
});

Route::get('getListCity/{CountryCode}/{CitySearch?}', function ($CountryCode,$CitySearch = Null) 
{   

	$json = json_decode(file_get_contents('http://ronasit.nodejs.website/files/city.list.json'), true);

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
		//$response[]=array('country_code' => $search['alpha2Code'], 'name' => $search['name'], 'country'=> $search['nativeName']);         
    }
	 
	return Response::json($response);
});

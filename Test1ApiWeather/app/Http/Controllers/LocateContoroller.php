<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class LocateContoroller extends Controller
{
    //
    function  getListCountries (Request $request) {
        //return 'CountrySearch '.$CountrySearch;
        
       
        $name   = $request->input('name');     
        
         //Если не использовать пакеты типа LaraCurl, Guzzle и т.п. 
        if (is_null($name )) {
            //Если нет уточняющих данных передаем все старны
            $json = json_decode(file_get_contents('https://restcountries.eu/rest/v2/all'), true);
        } else {
            //Передаюм только содержащие буквы 
            $json = json_decode(file_get_contents('https://restcountries.eu/rest/v2/name/'.$name), true);
        }
        
        //Очищаем от лишних данных
        $response=[];
        foreach($json as $key => $search)  {      				
            $response[]=array('country_code' => $search['alpha2Code'], 'name' => $search['name'], 'name_local'=> $search['nativeName']);         
        } 
             
        $headers = ['Content-type'=> 'application/json; charset=utf-8'];
        return Response::json($response, 200, $headers, JSON_UNESCAPED_UNICODE);
        
    }



    function getListCities($countryCode, Request $request)   {  
       echo  transliterator_transliterate('Any-Latin; Latin-ASCII',    "A æ Übérmensch på høyeste nivå! И я люблю PHP! есть. ﬁ");
    //вот это вообще конечно жесть, в идеале передеалать на отдельный микросервис и получать оттуда уже фильтрованные данные
    // И нету русского названия городов на кирилице
        $name   = $request->input('name');    
        $path = storage_path() . "/files/city.list.json"; 
        $json = json_decode(file_get_contents($path), true); 

        $response=[];
        foreach($json as $key => $search)  {    
        
            if ($search['country']== strtoupper($countryCode)) {
                if (is_null($name )) {
                    $response[]=$search; 
                } else {
                    if ( stripos($search['name'], $name)   !== false) {
                        $response[]=$search;
                    }
                }
            }		
        }
        
        return Response::json($response);
    }

}

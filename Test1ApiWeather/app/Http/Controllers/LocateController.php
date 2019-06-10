<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use LocateClient;

class LocateController extends Controller
{
    //Общий список стран
    public function  getListCountries (Request $request) {
       
        $name   = $request->input('name');     
        $response=LocateClient::getListCountries($name);
             
        $headers = ['Content-type'=> 'application/json; charset=utf-8'];
        return Response::json($response, 200, $headers, JSON_UNESCAPED_UNICODE);
        
    }

    //Общий список городов по Коду страны
    public function getListCities($countryCode, Request $request)   {                     
    
        $name   = $request->input('name');           
        $response=LocateClient::getListCities($countryCode,$name);

        $headers = ['Content-type'=> 'application/json; charset=utf-8'];
        return Response::json($response, 200, $headers, JSON_UNESCAPED_UNICODE);             
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTransferOpenWeather;
use Illuminate\Validation\Rule;
use Validator;
use Response;
class WeatherContoroller extends Controller
{
    function getCurrentWeatherCity($cityId,Request $request)
    {
         //TODO Вынести этот кусок валидации в общую часть
       //Осуществляем проверку-валидацию параметра units 
        $validatedData=Validator::make( $request->all(),[
            'units' => [
                'nullable',
                Rule::in(['metric', 'imperial']),
            ],
        ]);

        //Если проверку не прошли возвращаем ошибку.
        if ($validatedData->fails())
        {
            return ["error"=>$validatedData->errors()];        
        }

        //Получаем параметр запроса и по умолчанию ставим metric
        $units = $request->input('units','metric');            
        //Запрашиваем погоду у Фасада
        $dataTrOpenWeather = new DataTransferOpenWeather();
        $weather=$dataTrOpenWeather::getCurrentWeatherCity($cityId,$units); 
        //форсмируем заголовок и возвращаем json   
        $headers = ['Content-type'=> 'application/json; charset=utf-8'];
        return Response::json($weather, 200, $headers, JSON_UNESCAPED_UNICODE);        
    }

    function getCurrentWeatherGeoCoor($lat,$lon,Request $request)
    {

        //TODO Вынести этот кусок валидации  в общую часть
        //Осуществляем проверку-валидацию параметра units 
        $validatedData=Validator::make( $request->all(),[
            'units' => [
                'nullable',
                Rule::in(['metric', 'imperial']),
            ],
        ]);

        //Если проверку не прошли возвращаем ошибку.
        if ($validatedData->fails())
        {
            return ["error"=>$validatedData->errors()];        
        }

        //Получаем параметр запроса и по умолчанию ставим metric
        $units = $request->input('units','metric');            
        //Запрашиваем погоду у Фасада
        $dataTrOpenWeather = new DataTransferOpenWeather();
        $weather=$dataTrOpenWeather::getCurrentWeatherGeoCoor($lat,$lon,$units); 
        //форсмируем заголовок и возвращаем json   
        $headers = ['Content-type'=> 'application/json; charset=utf-8'];
        return Response::json($weather, 200, $headers, JSON_UNESCAPED_UNICODE);         
    }

   
}

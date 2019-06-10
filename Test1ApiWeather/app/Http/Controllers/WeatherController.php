<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenWeatherClient;
use Illuminate\Validation\Rule;
use Validator;
use Response;

class WeatherController extends Controller
{
    public function getCurrentWeatherCity($cityId,Request $request)
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
        $weather=OpenWeatherClient::getCurrentWeatherCity($cityId,$units); 
        
        //формируем заголовок и возвращаем json  
         //TODO Поискать более элегантное решение
        $headers = ['Content-type'=> 'application/json; charset=utf-8'];
        return Response::json($weather, 200, $headers, JSON_UNESCAPED_UNICODE);        
    }

    public function getCurrentWeatherGeoCoor($lat,$lon,Request $request)
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
        
        $weather=OpenWeatherClient::getCurrentWeatherGeoCoor($lat,$lon,$units); 
        //форсмируем заголовок и возвращаем json   
        $headers = ['Content-type'=> 'application/json; charset=utf-8'];
        return Response::json($weather, 200, $headers, JSON_UNESCAPED_UNICODE);         
    }

   
}

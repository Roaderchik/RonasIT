<?php

namespace App;

class LocateClient
{

    /**
     * Get list countries
     *
     * @param  string  $name
     * @return array
     */
    public function getListCountries($name)
    {   
         if (is_null($name )) {
            //Если нет уточняющих данных передаем все страны
            $url =config('api.locate_url').'/rest/v2/all';            
        } else {
            //Передаюм только содержащие буквы            
            $url =config('api.locate_url').'/rest/v2/name/'.$name;
        }
        $json = json_decode(file_get_contents($url), true);
            
        //Очищаем от лишних данных
        $response=[];
        foreach($json as $search)  {      				
            $response[]=array('country_code' => $search['alpha2Code'], 'name' => $search['name'], 'name_local'=> $search['nativeName']);         
        } 
        return  $response;
    }

     /**
     * Get list cities
     *
     * @param  string  $countryCode
     * @param  string  $name
     * @return array
     */
    public function getListCities($countryCode,$name)
    { 
        $path = storage_path() . "/files/city.list.json"; 
        $json = json_decode(file_get_contents($path), true); 

        $response=[];

        $countryCode = strtoupper($countryCode);
        //определяем язык и создаем альтернативный имя для поиска
        $re = '/^[\p{Latin}[A-Za-z]+$/m';
        preg_match_all($re, $name, $matches, PREG_SET_ORDER, 0);
        if (empty($matches)) {
            $typetranslit ='Russian-Latin/BGN;'; }
        else {
            $typetranslit ='Latin-Russian/BGN;';           
        }
        $name_inverce=transliterator_transliterate($typetranslit,   $name);       
      
        //Осущесвляем поиск и выборку данных
        foreach($json as  $search)  {  
            if ($search['country']== $countryCode) {
                if (is_null($name )) {
                    $response[]=$search; 
                } else {
                    if ((stripos($search['name'], $name)   === 0) || ( stripos($search['name'], $name_inverce)  === 0)) {
                        $response[]=$search;
                    }
                }
            }
        }
        return $response;        
    }

}

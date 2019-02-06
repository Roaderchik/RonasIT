# Тестовые задачи  для  RonasIt.com
![Image of mockup](https://resume.nodejs.website/UP.jpg)


Написать Апи-шлюз к сервису погода основываясь на API https://openweathermap.org/api
Обращаться будем к русской версии с параметром lang=RU 
RestAPI c запросами:
v1.1.1
#### getListCountry (Список стран, входящий параметр Начальные буквы страны)
 ```    
    * @param string $СountrySearch
 ```   
из JSON файла получить список стран
из JSON файла получить список стран и первым буквам

Если будет время реализовать через ISO
поискать доступ к ИСО 3166 на русском- список стран с кодировкой. 
типа https://www.iso.org/obp/ui/#search только API
вот отличный вариант https://restcountries.eu/#api-endpoints-all

##### Response JSON
    ```
     {
        "country_code": "RU",
        "name": "Russian",
        "name_local": "Россия"    
    }
    ```


#### getListCity (Список городов, входящий параметр Страна, Начальные буквы города)
 ``` 
    @param string $country
    * @param string $CitySearch
 ```   
из JSON файла получить список городов, по стране
из JSON файла получить список городов, по стране и первым буквам

##### Response JSON
    ```
     {
        "id": 1496153,
        "name": "Omsk",
        "name_local": "Омск",
        "country": "RU",
        "coord": {
          "lon": 73.400002,
          "lat": 55
        }
    }
    ```
#### getCurrentWeatherCity (Получить информацию о текущей погоде, входящий параметр ИдГорода,ТипТемпературы)
 ``` 
      @param Int $IdCity      
      @param string $units
 ```
 запрос к API https://api.openweathermap.org/data/2.5/weather?id=1496153&appid=a4cfee3044d5428481b8297bc76d67f2&lang=RU&units=metric
 //Расписать ответ
 
 #### getHistorytWeatherCity (Историю погоды на конретную дату и время)
  ``` 
      @param Int $IdCity      
      @param date $date
      @param time $time
      @param string $units
 ```  
 
 
 #### getCurrentWeatherGeoCoor (Получить информацию о текущей погоде, входящий параметр Долгота , Широта,ТипТемпературы)
 ``` 
      @param float $lon
      @param float $lat
      @param string $units
 ```
 запрос к API  https://api.openweathermap.org/data/2.5/weather?lat=55&lon=73.4&appid=a4cfee3044d5428481b8297bc76d67f2&lang=RU&units=metric
Разобраться в получения ГеоКоординат.
Определения местоположения - отдельным сервисом(?) 
 
 Для данного mockup-a это избыточный функционал(не реализуем?):
 #### getForecastWeatherCity (Прогноз на N дней вперед)
  ``` 
      @param Int $IdCity      
      @param Int $CountDay
      @param string $units
 ```  
Расписать ответы в соотвествии с mockup иконки и т.п.

Так же может лучше передавать координты, город и тип температуры(&units=imperial/metric), язык ответа(&lang=RU/US) запросов для настройки будущих ответов этому пользователю.(?)

Кеш добавить в запрос или тоже  вынести в настройки пользователя.(?)

Формат ответа от https://api.openweathermap.org
*   `coord`
    *   `coord.lon` City geo location, longitude
    *   `coord.lat` City geo location, latitude
*   `weather` (more info Weather condition codes)
    *   `weather.id` Weather condition id
    *   `weather.main` Group of weather parameters (Rain, Snow, Extreme etc.)
    *   `weather.description` Weather condition within the group
    *   `weather.icon` Weather icon id
*   `base` Internal parameter
*   `main`
    *   `main.temp` Temperature. Unit Default: Kelvin, Metric: Celsius, Imperial: Fahrenheit.
    *   `main.pressure` Atmospheric pressure (on the sea level, if there is no sea\_level or grnd\_level data), hPa
    *   `main.humidity` Humidity, %
    *   `main.temp_min` Minimum temperature at the moment. This is deviation from current temp that is possible for large cities and megalopolises geographically expanded (use these parameter optionally). Unit Default: Kelvin, Metric: Celsius, Imperial: Fahrenheit.
    *   `main.temp_max` Maximum temperature at the moment. This is deviation from current temp that is possible for large cities and megalopolises geographically expanded (use these parameter optionally). Unit Default: Kelvin, Metric: Celsius, Imperial: Fahrenheit.
    *   `main.sea_level` Atmospheric pressure on the sea level, hPa
    *   `main.grnd_level` Atmospheric pressure on the ground level, hPa
*   `wind`
    *   `wind.speed` Wind speed. Unit Default: meter/sec, Metric: meter/sec, Imperial: miles/hour.
    *   `wind.deg` Wind direction, degrees (meteorological)
*   `clouds`
    *   `clouds.all` Cloudiness, %
*   `rain`
    *   `rain.1h` Rain volume for the last 1 hour, mm
    *   `rain.3h` Rain volume for the last 3 hours, mm
*   `snow`
    *   `snow.1h` Snow volume for the last 1 hour, mm
    *   `snow.3h` Snow volume for the last 3 hours, mm
*   `dt` Time of data calculation, unix, UTC
*   `sys`
    *   `sys.type` Internal parameter
    *   `sys.id` Internal parameter
    *   `sys.message` Internal parameter
    *   `sys.country` Country code (GB, JP etc.)
    *   `sys.sunrise` Sunrise time, unix, UTC
    *   `sys.sunset` Sunset time, unix, UTC
*   `id` City ID
*   `name` City name
*   `cod` Internal parameter


Адрес шлюза http://ronasit.nodejs.website/

Для ларавел логичней использовать Люмен https://lumen.laravel.com/
Для Node.js тот же экспресс

но выберу полный ларавел, будет время перепишу на Люмен и Node.js
Вариант реализации 1. Делаю тупо на роутерах.
Вариант реализации 2. Делаю  на роутерах функционал в контролеры.
Вариант реализации 3. Делать на классах.

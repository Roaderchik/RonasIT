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
Для поиска стран используем API https://restcountries.eu/#api-endpoints-all

##### Response JSON
    ```
     {
        "country_code": "RU",
        "name": "Russian",
        "name_local": "Россия"    
    }
    ```
    
Запрос на все страна http://ronasit.nodejs.website/getListCountry/

Запросы с поиском http://ronasit.nodejs.website/getListCountry/Rus


#### getListCity (Список городов, входящий параметр Страна, Начальные буквы города)
 ``` 
    @param string $CountryCode
    * @param string $CitySearch
 ```   
из JSON файла получить список городов, по стране
из JSON файла получить список городов, по стране и первым буквам
было бы не плохо переделать на внешний микросервис

Запрос городов по  стране http://ronasit.nodejs.website/getListCity/Ru/

Запросы с поиском http://ronasit.nodejs.website/getListCity/Ru/Oms


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
 
 Запрос текущей погоды по IdCity http://ronasit.nodejs.website/getCurrentWeatherCity/1496153/
 
 Запрос текущей погоды по IdCity c форматом температуры standard   http://ronasit.nodejs.website/getCurrentWeatherCity/1496153/standard/
 
 Запрос текущей погоды по IdCity c форматом температуры metric(по умолчанию)    http://ronasit.nodejs.website/getCurrentWeatherCity/1496153/metric/
 
 Запрос текущей погоды по IdCity c форматом температуры imperial   http://ronasit.nodejs.website/getCurrentWeatherCity/1496153/imperial/
 
формат ответа https://github.com/Roaderchik/RonasIT/blob/master/responseopenweathermap.md
  
 #### getCurrentWeatherGeoCoor (Получить информацию о текущей погоде, входящий параметр Долгота , Широта,ТипТемпературы)
 ```  
      @param float $Lat
      @param float $Lon    
      @param string $Units
 ```
 запрос к API  https://api.openweathermap.org/data/2.5/weather?lat=55&lon=73.4&appid=a4cfee3044d5428481b8297bc76d67f2&lang=RU&units=metric
 
Запрос текущей погоды по ГеоКоординатам http://ronasit.nodejs.website/getCurrentWeatherGeoCoor/73.4/55/

Запрос текущей погоды по ГеоКоординатамc форматом температуры  http://ronasit.nodejs.website/getCurrentWeatherGeoCoor/73.4/55/metric

Разобраться в получения ГеоКоординат.
Определения местоположения - отдельным сервисом(?) 
 
 Для данного mockup-a это избыточный функционал(не реализуем?):
 
 #### getForecastWeatherCity (Прогноз на N дней вперед)
  ``` 
      @param Int $IdCity      
      @param Int $CountDay
      @param string $units
 ```  
 
 
 #### getHistorytWeatherCity (Историю погоды на конретную дату и время)
  ``` 
      @param Int $IdCity      
      @param date $date
      @param time $time
      @param string $units
 ```  
 
Так же может лучше передавать координты, город и тип температуры(&units=imperial/metric), язык ответа(&lang=RU/US) запросов для настройки будущих ответов этому пользователю.(?)
Кеш добавить в запрос или тоже  вынести в настройки пользователя.(?)



Адрес шлюза http://ronasit.nodejs.website/

Для ларавел логичней использовать Люмен https://lumen.laravel.com/
Для Node.js тот же экспресс

но выберу полный ларавел, будет время перепишу на Люмен и Node.js
Вариант реализации 1. Делаю тупо на роутерах.
Вариант реализации 2. Делаю  на роутерах функционал в контролеры.
Вариант реализации 3. Делать на классах.

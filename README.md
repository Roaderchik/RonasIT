# Тестовые задачи  для  RonasIt.com
![Image of mockup](https://resume.nodejs.website/UP.jpg)

Написать App API к сервису погоды основываясь на https://openweathermap.org/api

Обращаться будем к русской версии с параметром lang=RU 

REST API c запросами:

### countries 
Список стран, параметр @name - поиск по вхождению (латиница\кириллица)
 ```    
    * @param string $name
 ```   
Для поиска стран используется API https://restcountries.eu/#api-endpoints-all

#### Пример запроса

Запрос на все страна /countries

Запросы с поиском латиницей  /countries?name=Russian

Запросы с поиском кириллицей /countries?name=Россия


#### Пример ответа
    ```
     {
        "country_code": "RU",
        "name": "Russian Federation",
        "name_local": "Россия"    
    }
    ```

### /countries/:countryCode/cities 

Список городов-локаций,  параметр в URL countryCode - код Страны, параметр name поиск по началу названия города-локации (латиница\кириллица)

 ``` 
    @param string $countryCode
    * @param string $name
 ```   
#### Пример запроса

Запрос всех городов-локаций по  стране /countries/RU/cities

Запросы с поиском латиницей   /countries/RU/cities?name=Omsk

Запросы с поиском кириллицей  /countries/RU/cities?name=Омск


##### Пример ответа
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
    
### /weather/city/:сityId
Получить информацию о текущей погоде в городе-локации, параметр в URL сityId идентификатор города-локации ,параметр  units измерения температуры
 ``` 
      @param Int $сityId
      @param string $units
 ```
 запрос к API https://api.openweathermap.org/data/2.5/weather?id=1496153&appid=a4cfee3044d5428481b8297bc76d67f2&lang=RU&units=metric
 
 Запрос текущей погоды по IdCity /weather/city/1496153
 Запрос текущей погоды по IdCity c форматом температуры standard   /weather/city/1496153?units=standard 
 Запрос текущей погоды по IdCity c форматом температуры metric(по умолчанию)   /weather/city/1496153?units=metric 
 Запрос текущей погоды по IdCity c форматом температуры imperial   /weather/city/1496153?units=imperial
 
 ##### Пример ответа
  ```
     https://github.com/Roaderchik/RonasIT/blob/master/responseopenweathermap.md
   ```
   
 ### /weather/geo/:lat/:lot 
 Получить информацию о текущей погоде,параметр в URL lat- Долгота ,lot- Широта ,параметр  units измерения температуры
 ```  
      @param float $Lat
      @param float $Lon    
      @param string $Units
 ```
 
Запрос текущей погоды по ГеоКоординатам /weather/geo/55/73.4
Запрос текущей погоды по ГеоКоординатам c форматом температуры  /weather/geo/55/73.400002?units=metric

 ##### Пример ответа
 
 [Пример ответа Оpenweathermap](https://github.com/Roaderchik/RonasIT/blob/master/responseopenweathermap.md "Пример ответа Оpenweathermap")
 

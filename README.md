# Тестовые задачи  для  RonasIt.com
![Image of mockup](https://resume.nodejs.website/UP.jpg)


Написать Апи-шлюз к сервису погода основываясь на API https://openweathermap.org/api
Обращаться будем к русской версии с параметром lang=RU
RestAPI c запросами:
v1.1
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


#### getListCity (Список городов, входящий параметр Страна, Начальные буквы города)
 ``` 
    @param string $country
    * @param string $CitySearch
 ```   
из JSON файла получить список городов, по стране
из JSON файла получить список городов, по стране и первым буквам

//Расписать JSON ответ

#### getCurrentWeatherCity (Получить информацию о текущей погоде, входящий параметр ИдГорода,ТипТемпературы)
 ``` 
      @param Int $IdCity      
      @param string $units
 ```
 запрос к API https://api.openweathermap.org/data/2.5/weather?id=1496153&appid=a4cfee3044d5428481b8297bc76d67f2&lang=RU
 //Расписать ответ
 
 #### getHistorytWeatherCity (Историю погоды на конретную дату и время)
  ``` 
      @param Int $IdCity      
      @param date $date
      @param time $time
      @param string $units
 ```  
 #### getForecastWeatherCity (Прогноз на N дней вперед)
  ``` 
      @param Int $IdCity      
      @param Int $CountDay
      @param string $units
 ```  
 
 #### getCurrentWeatherGeoCoor (Получить информацию о текущей погоде, входящий параметр Долгота , Широта,ТипТемпературы)
 ``` 
      @param float $lon
      @param float $lat
      @param string $units
 ```
 запрос к API  https://api.openweathermap.org/data/2.5/weather?lat=55&lon=73.4&appid=a4cfee3044d5428481b8297bc76d67f2&lang=RU
 Разобраться в получения ГеоКоординат.
 

Расписать ответы в соотвествии с mockup иконки и т.п.

Определения местоположения - отдельным сервисом(?)

Так же может лучше передавать координты, город и тип температуры, язык ответа(?) запросов для настройки будущих ответов этому пользователю.(?)

Кеш добавить в запрос или тоже  вынести в настройки пользователя.(?)

# Тестовые задачи  для  RonasIt.com
![Image of mockup](https://resume.nodejs.website/UP.jpg)


Написать Апи-шлюз к сервису погода основываясь на API https://openweathermap.org/api
RestAPI c запросами:
v1.
#### getListCity (Список городов, входящий параметр Страна)
 ``` 
    @param string $country
 ```    
//Расписать ответ

#### getCurrentWeatherCity (Получить информацию о текущей погоде, входящий параметр ИдГорода,ТипТемпературы)
 ``` 
      @param Int $IdCity      
      @param string $units
 ```  
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

Расписать ответ в соотвествии с mockup иконки и т.п.

Определения местоположения - отдельным сервисом(?)

Так же может лучше передавать городи и тип температуры запросов для настройки будущих ответов этому пользователю.(?)

Кеш добавить в запрос или тоже  вынести в настройки пользователя.(?)

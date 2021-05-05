
# Junior PHP Разработчик 

RESTfull API написано на Laravel [route/api.php](https://github.com/abdrashov/task-junior-dev/blob/master/routes/api.php)


### Register Rest API

Получает данные POST **'/api/register'**:
~~~php
	$url = ;
	$params = 'name', 'password', 'password_confirmation';
~~~
Возвращает данные
~~~php
	json(['message' => ''], 201);
~~~

### Login Rest API

Получает данные POST **'/api/login'**:
~~~php
	$url = '/api/register';
	$params = 'name', 'password', 'password_confirmation';
~~~
Возвращает данные
~~~php
	json(['user' => Auth::user()], 200);
~~~

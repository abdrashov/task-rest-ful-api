# Junior PHP Разработчик Task


RESTfull API gриложение

~~~json
{
	"require": {
		"laravel/framework": "^8.12",
		"tymon/jwt-auth": "^1.0"
	}
}
~~~



### Register Rest API

Получает данные POST **'/api/register'**:
~~~php
	$params = 'name', 'password', 'password_confirmation';
~~~
Возвращает данные
~~~json
{
	"message": "User created successfully."
}
~~~


### Login Rest API

Получает данные POST **'/api/login'**:
~~~php
	$params = 'name', 'password';
~~~
Возвращает данные
~~~json
{
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYyMDI0MTM3MSwiZXhwIjoxNjIwMjQ0OTcxLCJuYmYiOjE2MjAyNDEzNzEsImp0aSI6ImtjZHdkRUhrMVpHUmdkOFQiLCJzdWIiOjgsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.nskNw3KhFzeRKGpf7fz-zqVd0uDx1_ad5LBV1PeDa"
}
~~~

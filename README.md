# Junior PHP Разработчик Task


RESTfull API приложение

~~~json
{
	"require": {
		"laravel/framework": "^8.12",
		"tymon/jwt-auth": "^1.0"
	}
}
~~~

<br>

### Register Rest API

Получает данные POST **'/api/register'**:
~~~php
	'name' 'password' 'password_confirmation'
~~~
Возвращает данные
status: 201
~~~json
{
	"message": "User created successfully."
}
~~~
status: 422
~~~json
{
	"status": "error",
	"message": {
		"name": [
			"The name field is required."
		],
		"password": [
			"The password field is required."
		]
	}
}
~~~


### Login Rest API

Получает данные POST **'/api/login'**:
~~~php
	'name', 'password'
~~~
Возвращает данные
status: 200
~~~json
{
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYyMDI0MTM3MSwiZXhwIjoxNjIwMjQ0OTcxLCJuYmYiOjE2MjAyNDEzNzEsImp0aSI6ImtjZHdkRUhrMVpHUmdkOFQiLCJzdWIiOjgsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.nskNw3KhFzeRKGpf7fz-zqVd0uDx1_ad5LBV1PeDa"
}
~~~
status: 422
~~~json
{
	"status": "error",
	"message": {
		"wrong": [
			"The provided credentials are incorect"
		]
	}
}
~~~

<br>


## Post


### Create post
Получает данные POST **'/api/post/store'**:
~~~php
	'title', 'content'
~~~
Возвращает данные
status: 201
~~~json
{
	"data": {
		"title": "post title",
		"content": "post content",
		"create_date": "14:11 06.05.2021"
	}
}
~~~


### Show post
Получает данные GET **'/api/post/{id}/show'**:
~~~php
	'id'
~~~
Возвращает данные
status: 200
~~~json
{
	"data": {
		"title": "post title",
		"content": "post content",
		"create_date": "14:11 06.05.2021",
		"author": "user"
	}
}
~~~
status: 404
~~~json
{
	"status": "error",
	"message": {
		"wrong": [
			"Not found"
		]
	}
}
~~~


### Edit post
Получает данные PUT **'/api/post/{id}/update'**:
~~~php
	'id', 'title', 'content'
~~~
Возвращает данные
status: 200
~~~json
{
	"data": {
		"title": "update title",
		"content": "update content",
		"update_date": "14:24 06.05.2021"
	}
}
~~~
status: 404
~~~json
{
	"status": "error",
	"message": {
		"wrong": [
			"Not found"
		]
	}
}
~~~
status: 404
~~~json
{
	"status": "error",
	"message": {
		"wrong": [
			"Not found"
		]
	}
}
~~~


### Delete post
Получает данные DELETE **'/api/post/{id}/destroy'**:
~~~php
	'id'
~~~
Возвращает данные
status: 200
~~~json
{
   "message": "Post success delete"
}
~~~
status: 404
~~~json
{
	"status": "error",
	"message": {
		"wrong": [
			"Not found"
		]
	}
}


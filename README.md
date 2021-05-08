# Task Junior PHP разработчика 

Написать RESTful api со следующими возможностями:
1. Создать регистрацию пользователя в БД.
Принимаемые данные: логин, пароль.
Успешный ответ: сообщение о создании пользователя

2. Авторизация. проверка наличия пользователя в системе, в противном случае выдавать в ответе ошибку.
Принимаемые данные: логин, пароль.
Успешный ответ: токен

3. Создание записи авторизованным пользователем.
Принимаемые данные: заголовок, текст.
Успешный ответ: заголовок, текст, дата создания.

4. Чтение записи блога по id. Информация ответа должна отображаться в формате: заголовок, текст, дата создания, автор.
Если записи не существует выдавать ошибку.

5. Изменение записи блога только автором по id
Принимаемые данные: заголовок, текст
Успешный ответ: измененный заголовок или/и текст, дата изменения.

6. Удаление записи по id только автором. Если не существует то выдавать ошибку
Успешный ответ: сообщение об удачном удалении.


# RESTful API приложение

~~~json
{
	"laravel/framework": "^8.12",
	"tymon/jwt-auth": "^1.0"
}
~~~

<br>

### Register Rest API

Получает данные **'/api/register'**, **method: POST**:
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

Получает данные **'/api/login'**, **method: POST**:
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
Получает данные **'/api/post/store'**, **method: POST**:
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
Получает данные **'/api/post/{id}/show'**, **method: GET**:
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
Получает данные **'/api/post/{id}/update'**, **method: PUT**:
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


### Delete post
Получает данные **'/api/post/{id}/destroy'**, **method: DELETE**:
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


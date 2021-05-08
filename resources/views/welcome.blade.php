<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .container {
                margin: 0 auto;
                max-width: 1270px;
                padding: 0 20px;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <h1>RESTful API приложение</h1>
            <ul>
                <li>
                    Login: api/login
                </li>
                <li>
                    Register: api/register
                </li>
                <li>
                    Get all posts: api/post
                </li>
                <li>
                    Get post: api/post/{id}/show
                </li>
                <li>
                    Save post: api/post/store
                </li>
                <li>
                    Edit post: api/post/{id}/update
                </li>
                <li>
                    Delete post: api/post/{id}/destroy
                </li>
            </ul>
        </div>
    </body>
</html>

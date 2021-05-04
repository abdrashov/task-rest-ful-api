<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <header class="text-gray-600 body-font border-1 border-b">
        <div class="container mx-auto flex flex-wrap p-5 flex-col text-center">
            <a class="title-font font-semibold text-gray-900 mb-2">
                <span class="text-2xl">PHP dev</span>
            </a>
            <nav class="mx-auto flex flex-wrap items-center text-base justify-center">
              @guest
                <a href="{{ route('register') }}" class="mr-5 hover:text-gray-900">
                  Регистрация
                </a>
                <a href="{{ route('login') }}" class="mr-5 hover:text-gray-900">
                  Войти
                </a>
              @else
                <a href="{{ route('home') }}" class="mr-5 hover:text-gray-900">
                  Home
                </a>
                <a href="{{ route('logout') }}" class="mr-5 hover:text-gray-900">
                  Logout
                </a>
              @endguest
            </nav>
        </div>
    </header>


    <div id="app">
        
        @yield('content')

    </div>

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

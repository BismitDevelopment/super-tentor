<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
    </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    @yield('navbar')
    <div id="app">
        <div id="mySidenav" class="sidenav d-flex flex-column align-items-center pt-5">
            <div class="profile-picture">
                <img src="{{ asset('img/Profile.jpg') }}" alt="" srcset="">
            </div>
            <h5 class="mt-3 mb-5">Pengguna 008</h5>
            <div class="menu align-self-start ml-5 d-flex align-items-center">
                <img src="{{ asset('img/box.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="">Home</a>
            </div>
            <div class="menu align-self-start ml-5 mt-5 d-flex align-items-center">
                <a>Simulasi Tryout</a>
            </div>
            <div class="menu align-self-start ml-5 mt-3 d-flex align-items-center">
                <img src="{{ asset('img/box.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="">Tryout Free</a>
            </div>
            <div class="menu align-self-start ml-5 mt-3 d-flex align-items-center">
                <img src="{{ asset('img/box.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="">Tryout Premium</a>
            </div>
            <div class="menu align-self-start ml-5 mt-3 d-flex align-items-center">
                <img src="{{ asset('img/box.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="">Tryout Nasional</a>
            </div>
        </div>  
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

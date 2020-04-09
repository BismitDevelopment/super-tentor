<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
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
        body {
            background-color: #f5f5f5 !important;
        }
    </style>
</head>
<body>
    @yield('navbar')
    <div id="app" class="main">
        <div id="mySidenav" class="sidenav d-flex flex-column align-items-center py-4">
            <div class="profile-picture">
                <img src="{{ asset('img/Profile.jpg') }}" alt="" srcset="">
            </div>
            <h5 class="username mt-3 pb-3 pt-2 w-100 mb-3 text-center border-bottom">Pengguna 008</h5>
            <div class="menu align-self-start mb-2 ml-5 d-flex align-items-center">
                <img src="{{ asset('img/mdi_home.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="{{ route('home') }}">Home</a>
            </div>
            <div class="menu align-self-start pl-5 mt-4 pb-2 border-bottom w-100 d-flex align-items-center">
                <a>Simulasi Tryout</a>
            </div>
            <div class="menu align-self-start pl-5 w-100 mt-3 d-flex align-items-center">
                <img src="{{ asset('img/mdi_assignment.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="{{ route('tryout-free') }}">Tryout Free</a>
            </div>
            <div class="menu align-self-start pl-5 w-100 mt-3 d-flex align-items-center">
                <img src="{{ asset('img/mdi_lock.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="">Tryout Premium</a>
            </div>
            <div class="menu align-self-start pl-5 w-100 pb-3 border-bottom mt-3 d-flex align-items-center">
                <img src="{{ asset('img/mdi_lock.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="">Tryout Nasional</a>
            </div>
            <div class="menu align-self-start pl-5 w-100 mt-3 mb-5 d-flex align-items-center">
                <img src="{{ asset('img/mdi_setting.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="">Pengaturan</a>
            </div>
            <div class="menu logout align-self-start pl-5 w-100 mt-3 d-flex align-items-center">
                <img src="{{ asset('img/mdi_logout.svg') }}" alt="" srcset="" height="30" width="30">
                {{-- <a class="ml-2" href="">Logout</a> --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>  
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>

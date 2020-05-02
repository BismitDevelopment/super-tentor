<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
    </script>
    @yield('scripts')


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
    <div id="app" class="main slideMain hideContent">
        <div id="mySidenav" class="navShow sidenav d-flex flex-column align-items-center py-4">
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
                <a class="ml-2" href="{{ route('home.tryouts.free.index') }}">Tryout Free</a>
            </div>
            <div class="menu align-self-start pl-5 w-100 mt-3 d-flex align-items-center">
                <img src="{{ asset('img/mdi_lock.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="{{ route('home.tryouts.premium.index') }}">Tryout Premium</a>
            </div>
            <div class="menu align-self-start pl-5 w-100 pb-3 border-bottom mt-3 d-flex align-items-center">
                <img src="{{ asset('img/mdi_lock.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="{{ route('home.tryouts.nasional.index') }}">Tryout Nasional</a>
            </div>
            <div class="menu align-self-start pl-5 w-100 mt-3 mb-md-3 mb-2 d-flex align-items-center">
                <img src="{{ asset('img/mdi_setting.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="">Pengaturan</a>
            </div>
            <div class="menu logout align-self-start pl-5 w-100 mt-1 d-flex align-items-center">
                <img src="{{ asset('img/mdi_logout.svg') }}" alt="" srcset="" height="30" width="30">
                {{-- <a class="ml-2" href="">Logout</a> --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="ml-2 logout" type="submit">Logout</>
                    </form>
                </div>
            </div>  
            <main class="pt-4 hideMain">
                @yield('content')
            </main>
        </div>
        
        <script>
            if (screen.width <= 576) {
                $(document).ready(function() {
                    $("#mySidenav").removeClass('navShow');
                $("#app").removeClass('slideMain');
                $("main").removeClass('hideMain');
                $("#app").removeClass('hideContent');
            })
        }
        function openNav() {
            document.getElementById("mySidenav").classList.toggle('navShow');
            document.getElementById("app").classList.toggle('slideMain');
            document.querySelector("main").classList.toggle('hideMain');
        }
    </script>    
</body>
</html>

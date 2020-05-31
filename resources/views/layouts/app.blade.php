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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    @yield('scripts')


<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/navbarDashboard.css') }}">
@yield('css')
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
                <img src="{{ asset('img/user.svg') }}" alt="" srcset="">
            </div>
            <h5 class="username mt-3 pb-3 pt-2 w-100 mb-3 text-center border-bottom">{{ auth()->user()->name }}</h5>
            <div class="menu align-self-start mb-2 ml-5 d-flex align-items-center">
                <img src="{{ asset('img/mdi_home.svg') }}" alt="" srcset="" height="30" width="30">
                <a class="ml-2" href="{{ route('home.index') }}">Home</a>
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
                <a class="ml-2" data-toggle="modal" href="#exampleModalCenter" id="nasional">Tryout Nasional</a>
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
                    <button class="ml-2 p-0 text-left logout" type="submit">Logout</>
                </form>
                </div>
            </div>  
            <main class="pt-4 hideMain">
                @yield('content')
            </main>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Masukkan Password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a type="button" href="{{ route('home.tryouts.nasional.index') }}" class="btn btn-warning" id="submitButton">Submit</a>
                    </div>
                    </div>
                </div>
             </div>
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

        // const password = "NAS123"

        $("#submit").click(function(e){
            e.preventDefault()
            console.log("Hehe")
        });
        
        </script>    
</body>
</html>


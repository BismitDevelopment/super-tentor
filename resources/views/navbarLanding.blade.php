        <link rel="stylesheet" href="{{ asset('css/navbarLanding.css') }}">
<<<<<<< HEAD
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
            <div class="container-fluid">
=======
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="col-7 col-md-3">
>>>>>>> a08f3a0d3a9b5fc33335ab7ba6a04c71cfbc1b76
                <a class="navbar-brand py-1" href="{{ route('welcome') }}">
                    <img src="{{ asset('img/logo-nav.svg') }}">
                </a>
            </div>
            <div class="col-6 navbar-center">
                <ul class="navbar-nav d-flex justify-content-center">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                    </li>
                    @if (Request::is('/'))
                        <li class="nav-item px-3">
                            <a class="nav-link" href="#">Produk</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="#">Program</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="#">Event</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-5 col-md-3 d-flex justify-content-end nav-auth">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link px-2 px-md-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item register">
                            <a class="nav-link daftar border px-lg-3 px-3 py-1 rounded-pill" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item d-flex justify-content-end">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                @endguest
            </div>
        </nav>

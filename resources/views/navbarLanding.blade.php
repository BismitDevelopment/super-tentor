<link rel="stylesheet" href="{{ asset('css/navbarLanding.css') }}">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
            <a class="navbar-brand py-1 col-md-2 col-8" href="{{ route('welcome') }}">
                <img src="{{ asset('img/logo-nav.svg') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-md-10" id="navbarSupportedContent">
                <div class="col-9">
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
                <div class="col-md-3 d-flex justify-content-end nav-auth">
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
                        <li class="nav-item d-flex justify-content-start justify-content-lg-end">
                            <a class="nav-link" href="{{ route('home.index') }}">Dashboard</a>
                        </li>
                    @endguest
                </div>    
            </div>
        </nav>
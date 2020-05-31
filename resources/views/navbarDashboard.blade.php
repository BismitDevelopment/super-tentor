<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow px-md-5 px-3">
    <div class="container-fluid">
        <a class="navbar-brand py-1 mx-0" onclick="openNav()">
            <img src="{{ asset('img/BurgerMenu.svg') }}" height="25" class="">
        </a>
        <a class="logo navbar-brand py-1 mx-auto" href="{{ route('welcome') }}">
            <img src="{{ asset('img/logo-nav.svg') }}" height="35" class="">
        </a>
        <a href="" class="notif_">
            <img src="{{ asset('img/mdi_notifications.svg') }}" alt="">
        </a>
        <a class="my-auto mx-3 username">{{ auth()->user()->name }}</a>
        <a class="py-0 my-0 profile-picture">
            <img class="" src="{{ asset('img/user.svg') }}" alt="">
        </a>
    </div>
</nav>


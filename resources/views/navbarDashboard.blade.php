<link rel="stylesheet" href="{{ asset('css/navbarDashboard.css') }}">
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow px-4">
    <div class="container-fluid">
        <a class="navbar-brand py-1 mx-0" onclick="openNav()">
            <img src="{{ asset('img/BurgerMenu.svg') }}" height="25" class="">
        </a>
        <a class="logo navbar-brand py-1 mx-auto" href="{{ route('welcome') }}">
            <img src="{{ asset('img/logo-nav.svg') }}" height="35" class="">
        </a>
        <a class="my-auto mr-2 username">Pengguna 008</a>
        <a class="py-0 my-0 profile-picture">
            <img class="" src="{{ asset('img/Profile.jpg') }}" alt="">
        </a>
    </div>
</nav>
<script>
    function openNav() {
        document.getElementById("mySidenav").classList.toggle('navShow');
        document.getElementById("app").classList.toggle('slideMain');
    }
</script>


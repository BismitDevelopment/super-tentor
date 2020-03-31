<link rel="stylesheet" href="{{ asset('css/navbarDashboard.css') }}">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand py-1 mx-0" href="#" onclick="openNav()">
            <img src="{{ asset('img/BurgerMenu.svg') }}" height="25" class="">
        </a>
        <a class="navbar-brand py-1 mx-auto" href="{{ route('welcome') }}">
            <img src="{{ asset('img/logo-nav.svg') }}" height="35" class="">
        </a>
    </div>
</nav>
<script>
    function openNav() {
        document.getElementById("mySidenav").classList.toggle('navShow');
        document.getElementById("app").classList.toggle('slideMain');
    }
</script>

<link rel="stylesheet" href="{{ asset('css/navbarDashboard.css') }}">
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow px-md-5 px-3">
    <div class="container-fluid">
        <a class="navbar-brand py-1 mx-0" onclick="openNav()">
            <img src="{{ asset('img/BurgerMenu.svg') }}" height="25" class="">
        </a>
        <a class="logo navbar-brand py-1 mx-auto" href="{{ route('welcome') }}">
            <img src="{{ asset('img/logo-nav.svg') }}" height="35" class="">
        </a>
        <a href="" class="notif">
            <img src="{{ asset('img/mdi_notifications.svg') }}" alt="">
        </a>
        <a class="my-auto mx-3 username">Pengguna 008</a>
        <a class="py-0 my-0 profile-picture">
            <img class="" src="{{ asset('img/Profile.jpg') }}" alt="">
        </a>
    </div>
</nav>
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous">
</link>
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


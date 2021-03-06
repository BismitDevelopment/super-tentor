<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800&display=swap" rel="stylesheet">

    {{-- Script --}}
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            font-family: 'Montserrat';
        }

        form {
            width: 20em;
        }

        form * {
            margin: .5em 0;
        }

        input {
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.25);
            width: 100%;
            padding: .7em;
            outline: none;
        }

        input::placeholder {
            color: rgba(196, 196, 196, .9);
        }

        input[name=email] {
            background-image: url(/img/email.svg);
            background-repeat:no-repeat;
            background-size: 1.3em;
            background-position: 4% 50%;
            padding-left: 2.5em;
        }

        input[type=password] {
            background-image: url(/img/lock.svg);
            background-repeat:no-repeat;
            background-size: 1.3em;
            background-position: 4% 50%;
            padding-left: 2.5em;
        }

        h1 {
            font-weight: 700;
            font-size: 2.5em;
        }

        h5, a {
            font-weight: normal;
            color: rgba(0, 0, 0, 0.3);
            text-align: center;
            font-size: .9em;
        }

        a {
            color: #67A69D;
        }

        a + div * {
            margin: 0;
            padding: 0;
            vertical-align: text-bottom;
        }

        button {
            background: #E9D038;
            border-radius: 10px;
            outline: none;
            border: none;
            padding: .5em 0;
            width: 100%;
            color: white;
            font-weight: 800;
            font-size: 1.3em;
        }

        .login-body {
            background: white;
            border-radius: 20px;
            padding: 3em 5em;
        }

        .line {
            border: .5px solid #C4C4C4;
            width: 8em;
            height: 1px;
        }

        .line + h4 {
            font-size: 1.2em;
            color: #C4C4C4;
            margin: 0 .5em;
        }

        @media (max-width: 576px) {
            form {
                width: 60vw;
            }

            .login-body {
                width: 80vw;
                font-size: 4vw;
            }

            .line {
                width: 25vw;
            }

            #facebook-btn {
                width: 60vw;
            }
        }

    </style>
</head>
<body>
    <div class="login-body d-flex flex-column align-items-center">
        <h1>Login</h1>
        <form class="d-flex flex-column align-items-center" action="{{ route('login') }}" method="POST">
            @csrf
            <input id="email" placeholder="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                {{ __('Lupa Kata Sandi?') }}
                </a>
            @endif


            <button type="submit" class="">{{ __('Login') }}</button>
            <div class="d-flex flex-row align-items-center justify-content-center">
                <span class="line"></span><h4>atau</h4><span class="line"></span>
            </div>
            <a href="" id="facebook-btn"><img class="img-fluid" src="/img/facebook-login.svg" alt=""></a>
            <div class="d-flex justify-content-center">
                <h5>Belum punya akun?</h5>
                <a href="/register">Daftar di sini</a>
            </div>
        </form>
    </div>

    <script defer>
        $(document).mousemove(function(event) {
            windowWidth = $(window).width();
            windowHeight = $(window).height();
            
            mouseXpercentage = Math.round(event.pageX / windowWidth * 100)/20 + 20;
            mouseYpercentage = Math.round(event.pageY / windowHeight * 100)/20 + 30;
        
            $('body').css(
                'background', 
                `
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, 1), rgba(233, 208, 56, 1) 5%, rgba(103, 166, 157, .2) 10%, rgba(0,0,0,0) 10%),
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, 1), rgba(233, 208, 56, 1) 10%, rgba(103, 166, 157, .2) 20%, rgba(0,0,0,0) 10%),
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, 1), rgba(233, 208, 56, 1) 10%, rgba(103, 166, 157, .2) 30%, rgba(0,0,0,0) 10%),
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, 1), rgba(233, 208, 56, 1) 20%, rgba(103, 166, 157, .2) 40%, rgba(0,0,0,0) 20%),
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, 1), rgba(233, 208, 56, 1) 10%, rgba(103, 166, 157, .2) 50%, rgba(0,0,0,0) 30%),
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, 1), rgba(233, 208, 56, 1) 30%, rgba(103, 166, 157, .2) 60%, rgba(0,0,0,0) 40%),
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, 1), rgba(233, 208, 56, 1) 40%, rgba(103, 166, 157, .2) 80%, rgba(0,0,0,0) 50%),
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, .5), rgba(233, 208, 56, .5) 50%, rgba(103, 166, 157, .2) 90%, rgba(0,0,0,0) 75%),
                radial-gradient(circle at ` + mouseXpercentage + `% ` + mouseYpercentage + `%, rgba(233, 208, 56, .5), rgba(233, 208, 56, 1) 60%, rgba(103, 166, 157, 1) 100%, rgba(0,0,0,0) 75%)
                `);
        });
    </script>
</body>
</html>
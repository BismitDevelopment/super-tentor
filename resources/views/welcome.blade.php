<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Super Tentor</title>

        <!-- Script -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="css/landing.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        @include('navbarLanding')
        <div class="main-landing container-fluid">
            <!-- Page 1 -->
            <div class="page-1 row">
                <div class="left col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end">
                    <img id="blogging" src="/img/svg-landing/blogging.svg" alt="">
                </div>
                <div class="right col-12 col-lg-6 d-flex justify-content-center">
                    <div>
                        <h1 class="title">Media Tentor Online Terbaik di Indonesia!</h1>
                        <h2 class="title-desc">Ingin Masuk & Lulus Tes CPNS, SBMPTN atau PKN STAN 2020?</h2>
                        <div class="button-container">
                            <a href="{{ route('register') }}" class="rounded-btn">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page 2 -->
            <div class="page-2 d-flex flex-column align-items-center">
                <div class="header">
                    <small>KEUNGGULAN</small>
                    <h1 class="title">Kenapa SuperTentor</h1>
                </div>
                <div class="card-container">
                    @foreach($keunggulan_data as $data)
                        <div class="card">
                            <img src={{$data['img']}} alt="">
                            <h3>{{$data['title']}}</h3>
                            <p>{{$data['content']}}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Page 3 -->
            <div class="page-3">
                <div class="svg d-flex justify-content-between">
                    <img id="page-3-svg-1" src="/img/svg-landing/page-3-svg-1.svg" alt="">
                    <img id="page-3-svg-2" src="/img/svg-landing/page-3-svg-2.svg" alt="">
                </div>
                <div class="header">
                    <small>PROGRAM</small>
                    <h1 class="title">Pembelajaran sesuai pilihan</h1>
                </div>
                <div class="card-container">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="program-card">
                            <div class="card-header">{{$program_data['title'][$i]}}</div>
                            <div class="card-body">
                                <ul>
                                    @foreach($program_data[$i] as $data)
                                        <li><img src="/img/svg-landing/dot.svg" alt=""><span>{{$data}}</span></li>
                                    @endforeach
                                </ul>
                                @if ($i == 0)
                                    <div class="card-bottom">
                                        <a href="{{ route('register') }}" class="rounded-btn">Daftar Sekarang</a>
                                        <small>atau <a href="{{ route('register') }}">Coba gratis</a></small>
                                    </div>
                                @else
                                    <div class="card-bottom">
                                        <a class="rounded-btn disabled" disabled>Coming Soon</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Page 4 -->
            <div class="page-4">
                <div class="svg d-flex justify-content-between">
                    <img id="page-4-left" src="/img/svg-landing/page-4-left.svg" alt="">
                    <img id="page-4-right" src="/img/svg-landing/page-4-right.svg" alt="">
                </div>
                <div class="header">
                    <small>TESTIMONIAL</small>
                    <h1 class="title">Apa yang mereka katakan tentang kita</h1>
                </div>
                <div class="carousel-container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-card">
                                    <div class="profile-pic">
                                        <img class="" src={{$carousel_data[0]['img_link']}} alt="">
                                    </div>
                                    <p>{{$carousel_data[0]['message']}}</p>
                                    <h4 class="name">{{$carousel_data[0]['name'] .', '. $carousel_data[0]['age']}}</h4>
                                    <h5>{{$carousel_data[0]['kantor']}}</h5>
                                </div>
                            </div>
                            @foreach(array_slice($carousel_data, 1) as $data)
                                <div class="carousel-item">
                                    <div class="carousel-card">
                                        <div class="profile-pic">
                                            <img class="" src="{{$data['img_link']}}" alt="">
                                        </div>
                                        <p>{{$data['message']}}</p>
                                        <h4 class="name">{{$data['name'] .', '. $data['age']}}</h4>
                                        <h5>{{$carousel_data[0]['kantor']}}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <img src="/img/svg-landing/left-arrow.svg" alt="">
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <img src="/img/svg-landing/right-arrow.svg" alt="">
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
            </div>

            <!-- Page 5 -->
            <div class="page-5">
                <div class="header">
                    <small>FAQ</small>
                    <h1 class="title">kami siapkan beberapa hal untuk memulai</h1>
                </div>
                <div class="info-container container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            @foreach(array_slice($faq_data, 0, count($faq_data)/2 + 1) as $data)
                                <div class="info-card">
                                    <button class="accordion"><img src="/img/svg-landing/arrow-down.svg" alt=""></button>
                                    <div class="info-card-body">
                                        <h1>{{$data['title']}}</h1>
                                        <p class="panel">{{$data['description']}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-6">
                            @foreach(array_slice($faq_data, count($faq_data)/2 + 1) as $data)
                                <div class="info-card">
                                    <button class="accordion"><img src="/img/svg-landing/arrow-down.svg" alt=""></button>
                                    <div class="info-card-body">
                                        <h1>{{$data['title']}}</h1>
                                        <p class="panel">{{$data['description']}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            {{-- @include('inc.footer') --}}
        </div>
    </body>
    <script defer>
        let acc = document.getElementsByClassName("accordion");
        let panelList = document.getElementsByClassName("panel");
        for (let i = 0; i < acc.length; i++) {
            let panel = panelList[i];
            panel.style.display = "none";
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active-btn");
                if (panel.style.display === "block") {
                panel.style.display = "none";
                } else {
                panel.style.display = "block";
                }
            });
        }
    </script>
</html>

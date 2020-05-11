@extends('layouts.app')
@section('navbar')
    @include('navbarDashboard')
@endsection
@section('content')
<link rel="stylesheet" href="css/dashboardHome.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
<div class="dash-main d-flex flex-column align-items-center">
    <div class="main-container">
        {{-- Page 1 --}}
        <div class="page-1">
            <div class="header">
                <h1>{{$data['notif']['header']}}</h1>
                <div class="underline"></div>
            </div>
            <div class="notif">
                <div class="notif-header">
                    <h1>Selamat datang kembali, {{$data['notif']['name']}}!</h1>
                    <div class="underline"></div>
                </div>
                <div class="notif-body">
                    <div class="d-flex">
                        <h1 class="notif-title">{{$data['notif']['notif-title']}}</h1>
                        <h1 class="notif-timer">{{$data['notif']['notif-timer']}} Hari Lagi</h1>
                    </div>
                    <div class="notif-content d-flex flex-column justify-content-between">
                        <p>Tryout nasional akan diadakan secara serentak pada tanggal 17 April 2020. Password untuk memasuki tryout nasional terdapat pada notifikasi pengguba labla</p>
                        <div class="notif-bottom d-flex justify-content-end">
                            <a href="">Lihat Notifikasi Lainnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Page 2 --}}
        <div class="page-2">
            <div class="header">
                <h1>{{$data['progress']['header']}}</h1>
                <div class="underline"></div>
            </div>
            <div class="progress-container d-flex flex-column flex-md-row justify-content-between">
                    @foreach($data['progress']['data'] as $data)
                        <div class="progress-body">
                            <div class="progress-header d-flex justify-content-between">
                                <h1>{{ $data['title'] }}</h1>
                                @if (!empty($data['progress']))
                                    <div class="progress-data">{{$data['progress']}}/{{$data['total']}}</div>
                                @endif
                            </div>
                            @if (!empty($data['progress']))
                                <div class="d-flex justify-content-center">
                                    <div class="progress-bar">
                                        <div class="progress" style="width: {{$data['bar-width']}}%"></div>
                                    </div>
                                </div>
                            @else
                                <p>Lihat Notifikasi untuk  pengumuman tryout nasional</p>
                            @endif
                        </div>
                    @endforeach
            </div>
            
        </div>
        
        {{-- Page 3 --}}
        <div class="page-3">
            <div class="header">
                {{-- <h1>{{var_dump($data['simulasi']['header'])}}</h1> --}}
                <h1>Hasil Simulasi</h1>
                <div class="underline"></div>
            </div>
            
            <table class="table-1">
                <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td>Judul dan Tipe</td>
                        <td>Waktu Pengerjaan</td>
                        <td><div>Poin</div></td>
                        <td>Status</td>
                        <td>Pembahasan</td>
                    </tr>
                </thead>
                <tbody>
                    {{-- Iterasi content tabel --}}
                    @for($i = 0; $i < 5; $i++)
                        <tr class="table-border">
                            <td colspan="100%" class="py-2">
                                <div class="d-flex justify-content-center">
                                    <div class="underline"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><h4>4/15/2020</h4></td>
                            <td>
                                <h4>Try Out Serentak 01 - SKD</h4>
                                <h4>FREE</h4>
                            </td>
                            <td><h4>1:00:00</h4></td>
                            <td>
                                <div >
                                    <h4>TWK: 0</h4>
                                    <h4>TIU: 0</h4>
                                    <h4>TKP: 0</h4>
                                    <h4>Total: 0</h4>
                                </div>
                            </td>
                            <td><h4>Tidak Lulus</h4></td>
                            <td>
                                <button class="table-button">
                                    Pembahasan
                                </button>
                            </td>
                        </tr>
                    @endfor
                </tbody>
                <tr class="table-border">
                    <td colspan="100%">
                        <div class="d-flex justify-content-center">
                            <div class="underline"></div>
                        </div>
                    </td>
                </tr>
                
            </table>
            <table class="table-2">
                <tr class="table-footer">
                    <td colspan="100%">
                        <div class="d-flex justify-content-center">
                            <a href="">
                                <img src="img/svg-dash-home/left.svg" alt="">
                            </a>
                            <div class="pagination-bar">
                                1-5
                            </div>
                            <a href="">
                                <img src="img/svg-dash-home/right.svg" alt="">
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@include('inc.footer')
@endsection
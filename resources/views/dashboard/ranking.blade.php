@extends('layouts.app')
@section('navbar')
    @include('navbarDashboard')
@endsection
@section('content')
<link rel="stylesheet" href="css/dashboardRanking.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&display=swap" rel="stylesheet">
<div class="dash-main d-flex flex-column align-items-center">
    <div class="main-container">
        {{-- Page 1 --}}
        <div class="page-1">
            <div class="header">
                <h1>Ranking Try Out Serentak 01 - SKD</h1>
                <div class="underline"></div>
            </div>
            <div class="notif">
                <div id="person-container">
                    <div class="d-flex justify-content-end">
                        <img id="person" src="../img/svg-ranking/torso-person.svg" alt="">
                    </div>
                </div>
                <div class="notif-header">
                    <h1>Anda berada di peringkat 6 dari 100 pengguna</h1>
                    <div class="underline"></div>
                </div>
                <div class="notif-body">
                    <div class="notif-content d-flex flex-column justify-content-between">
                        <p>Hasil ranking diambil dari skor percobaan pertama ujian anda</p>
                    </div>
                </div>
            </div>
            <div class="page-1 test"></div>
        </div>

        {{-- Page 3 --}}
        <div class="page-3">
            <div class="header">
                {{-- <h1>{{var_dump($data['simulasi']['header'])}}</h1> --}}
                <h1>Scoreboard</h1>
                <div class="underline"></div>
            </div>
            
            <table class="table-1">
                <thead>
                    <tr>
                        <td>Peringkat</td>
                        <td>Username</td>
                        <td>Waktu</td>
                        <td><div>Poin</div></td>
                        <td>Status</td>
                        <td>Tanggal</td>
                    </tr>
                </thead>
                <tbody>
                    {{-- Iterasi content tabel --}}
                    @for($i = 0; $i < 11; $i++)
                        <tr class="table-border">
                            <td colspan="100%" class="py-2">
                                <div class="d-flex justify-content-center">
                                    <div class="underline"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><h4>{{$i}}</h4></td>
                            <td>
                                <h4>Pengguna 008</h4>
                            </td>
                            <td>
                                <h4>1:00:00</h4>
                            </td>
                            <td>
                                <h4>Total: 0</h4>
                            </td>
                            <td><h4>Lulus</h4></td>
                            <td>
                                <h4>4/15/2020</h4>
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
@endsection
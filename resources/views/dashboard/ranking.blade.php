@extends('layouts.app')

@section('navbar')
    @include('navbarDashboard')
@endsection

@section('css')    
<link rel="stylesheet" href="{{asset('css/dashboardRanking.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="dash-main d-flex flex-column align-items-center">
    <div class="main-container">
        {{-- Page 1 --}}
        <div class="page-1">
            <div class="header">
                <h1>Ranking {{ $paket->nama }}</h1>
                <div class="underline"></div>
            </div>
            <div class="notif">
                <div id="person-container">
                    <div class="d-flex justify-content-end">
                        <img id="person" src="../img/svg-ranking/torso-person.svg" alt="">
                    </div>
                </div>
                <div class="notif-header">
                    <h1>Anda berada di peringkat {{ $currentUserRank }} dari {{ count($userRankList) }} pengguna</h1>
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
                    @for($i=0; $i < count($userRankList); $i++)
                        <tr class="table-border">
                            <td colspan="100%" class="py-2">
                                <div class="d-flex justify-content-center">
                                    <div class="underline"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><h4>{{(($page-1) * 10) + $i + 1}}</h4></td>
                            <td>
                                <h4>{{ $userRankList[$i]->name }}</h4>
                            </td>
                            <td>
                                <h4>{{ $userRankList[$i]->user_simulation->durasi_ujian }}</h4>
                            </td>
                            <td>
                                <h4>Total: {{ $userRankList[$i]->user_simulation->total_skor }}</h4>
                            </td>
                            <td>
                                <h4>{{ $userRankList[$i]->user_simulation->status }}</h4>
                            </td>
                            <td>
                                <h4>{{ date('d/m/Y', strtotime($userRankList[$i]->user_simulation->created_at)) }}</h4>
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
                            @if ($page!==1)
                                @if ($paket->jenis_tryout === 0)
                                    <a href="{{ route('home.tryouts.free.ranking', ['page'=> $page-1]) }}">
                                @elseif($paket->jenis_tryout === 1 )
                                    <a href="{{ route('home.tryouts.premium.ranking', ['page'=> $page-1]) }}">
                                @else
                                    <a href="{{ route('home.tryouts.nasional.ranking', ['page'=> $page-1]) }}">
                                @endif
                                    <img src="{{ asset('img/svg-dash-home/left.svg') }}" alt="">
                                </a>
                            @endif

                            <div class="pagination-bar">
                                @if ($pages !== 0.0)
                                    {{ $page }}-{{ $pages }}
                                @endif
                            </div>

                            @if ($page < $pages)
                                @if ($paket->jenis_tryout === 0)
                                    <a href="{{ route('home.tryouts.free.ranking', ['paket'=>$paket->id,'page'=> $page+1]) }}">
                                @elseif($paket->jenis_tryout === 1 )
                                    <a href="{{ route('home.tryouts.premium.ranking', ['paket'=>$paket->id,'page'=> $page+1]) }}">
                                @else
                                    <a href="{{ route('home.tryouts.nasional.ranking', ['paket'=>$paket->id,'page'=> $page+1]) }}">
                                @endif
                                    <img src="{{ asset('img/svg-dash-home/right.svg') }}" alt="">
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
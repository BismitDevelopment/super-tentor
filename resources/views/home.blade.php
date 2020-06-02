@extends('layouts.app')
@section('navbar')
    @include('navbarDashboard')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboardHome.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
@endsection

@section('content')
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
                        <p>Tryout nasional akan diadakan secara serentak pada tanggal 17 April 2020. Password untuk memasuki tryout nasional terdapat pada notifikasi</p>
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
                                @if (array_key_exists('progress',$data))
                                    <div class="progress-data">{{$data['progress']}}/{{$data['total']}}</div>
                                @endif
                            </div>
                            @if (array_key_exists('progress',$data))
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
                    @foreach($user_simulations_per_page as $user_sim)
                        <tr class="table-border">
                            <td colspan="100%" class="py-2">
                                <div class="d-flex justify-content-center">
                                    <div class="underline"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>{{ date('d/m/Y', strtotime($user_sim->simulation->created_at)) }}</h4>
                            </td>
                            <td>
                                <h4>{{ $user_sim->nama }}</h4>
                                @if ($user_sim->jenis_tryout === 0)
                                    <h4>FREE</h4>
                                @elseif($user_sim->jenis_tryout ===1)
                                    <h4>PREMIUM</h4>
                                @else
                                    <h4>NASIONAL</h4>
                                @endif
                            </td>
                            <td><h4>{{ $user_sim->simulation->durasi_ujian }}</h4></td>
                            <td>
                                <div>
                                    <h4>TWK: {{ $user_sim->simulation->skor_twk }}</h4>
                                    <h4>TIU: {{ $user_sim->simulation->skor_tiu }}</h4>
                                    <h4>TKP: {{ $user_sim->simulation->skor_tkp }}</h4>
                                    <h4>Total: {{ $user_sim->simulation->total_skor }}</h4>
                                </div>
                            </td>
                            <td>
                                <h4>{{ $user_sim->simulation->status }}</h4>
                            </td>
                            <td>
                                <a href="{{ route('home.tryouts.nasional.pembahasan', 
                                ['paket'=>$user_sim->simulation->paket_id, 'simulation'=>$user_sim->simulation->id]) }}">
                                    <button class="table-button">
                                        Pembahasan
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
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
                                <a href="{{ route('home.index', ['page'=> $page-1]) }}">
                                    <img src="{{ asset('img/svg-dash-home/left.svg') }}" alt="">
                                </a>
                            @endif

                            <div class="pagination-bar">
                                @if ($pages !== 0.0)
                                    {{ $page }}-{{ $pages }}
                                @endif
                            </div>

                            @if ($page < $pages)
                                <a href="{{ route('home.index', ['page'=>$page+1]) }}">
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
{{-- @include('inc.footer') --}}
@endsection
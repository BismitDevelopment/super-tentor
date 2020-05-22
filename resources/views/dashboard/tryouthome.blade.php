@extends('layouts.app')

@section('navbar')
    @include('navbarDashboard')
@endsection

@section('content')
<style>
    main {
        min-height: 90vh;
    }
</style>
<link rel="stylesheet" href="{{ asset('css/tryouthome.css') }}">
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0">
                <div class="card-body p-lg-3 p-4 d-flex flex-column justify-content-center align-items-center">
                    <h3>{{ $paket->nama }}</h3>
                    <p class="text-center mt-3">Harap perhatikan! Saat ujian telah dimulai kamu dilarang keluar dari laman ujian atau kamu akan dinyatakan tidak lulus. Layaknya saat ujian CPNS oleh BKN kamu dilarang membuka buku atau mencari jawaban di Internet. Pengerjaan pertama yang akan dimasukan ke dalam peringkat nasional maka harap kerjakan semaksimal mungkin!
                    </p>
                    {{-- <h5 class="mt-3 text-center">Sistem Penilaian SKD CPNS oleh BKN <br> Benar = (+5) <br> Salah = (0) <br> Kosong = (0)</h5> --}}
                    <div class="d-flex justify-content-center align-items-center mt-3 flex-lg-row flex-column">
                        <div class="card border-0 card-inside d-flex flex-column justify-content-center align-items-center text-center py-3 px-4 m-lg-3 m-2">
                            <b>Soal TIU</b> Total Soal: 35 <br> Alokasi Waktu: <br> 30 Menit <br> Passing Grade: 65
                        </div>
                        <div class="card border-0 card-inside d-flex flex-column justify-content-center align-items-center text-center py-3 px-4 m-lg-3 m-2">
                            <b>Soal TKP</b> Total Soal: 35 <br> Alokasi Waktu: <br> 30 Menit <br> Passing Grade: 65
                        </div>
                        <div class="card border-0 card-inside d-flex flex-column justify-content-center align-items-center text-center py-3 px-4 m-lg-3 m-2">
                            <b>Soal TWK</b> Total Soal: 30 <br> Alokasi Waktu: <br> 30 Menit <br> Passing Grade: 65
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-center mt-3 buttons mb-5 mb-md-3">
                @if ($paket->jenis_tryout === 0)
                    <a class="mx-2" href="{{ route('home.tryouts.free.index') }}"><button type="button" class="btn btn-yellow px-3">Kembali</button></a>
                    <a class="mx-2" href="{{ route('home.tryouts.free.ujian', ['paket'=>$paket->id])}}"><button type="button" class="btn btn-green px-3">Mulai Quiz</button></a>
                @elseif ($paket->jenis_tryout === 1)
                    <a class="mx-2" href="{{ route('home.tryouts.premium.index') }}"><button type="button" class="btn btn-yellow px-3">Kembali</button></a>
                    <a class="mx-2" href="{{ route('home.tryouts.premium.ujian', ['paket'=>$paket->id])}}"><button type="button" class="btn btn-green px-3">Mulai Quiz</button></a>
                @elseif ($paket->jenis_tryout === 2)
                    <a class="mx-2" href="{{ route('home.tryouts.nasional.index') }}"><button type="button" class="btn btn-yellow px-3">Kembali</button></a>
                    <a class="mx-2" href="{{ route('home.tryouts.nasional.ujian', ['paket'=>$paket->id])}}"><button type="button" class="btn btn-green px-3">Mulai Quiz</button></a>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

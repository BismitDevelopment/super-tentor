@extends('layouts.app')
@section('navbar')
    @include('navbarDashboard')
@endsection


@section('content')
<link rel="stylesheet" href="{{ asset('css/tryouthome.css') }}">
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0">
                <div class="card-body p-5 d-flex flex-column justify-content-center align-items-center">
                    <h3>Try Out Serentak 01 - SKD</h3>
                    <p class="text-center mt-3">Harap perhatikan! Saat ujian telah dimulai kamu dilarang keluar dari laman ujian atau kamu akan dinyatakan tidak lulus. Layaknya saat ujian CPNS oleh BKN kamu dilarang membuka buku atau mencari jawaban di Internet. Pengerjaan pertama yang akan dimasukan ke dalam peringkat nasional maka harap kerjakan semaksimal mungkin!
                    </p>
                    <h5 class="mt-3 text-center">Sistem Penilaian SKD CPNS oleh BKN <br> Benar = (+5) <br> Salah = (0) <br> Kosong = (0)</h5>
                    <div class="d-flex justify-content-center align-items-center mt-3 flex-lg-row flex-column">
                        <div class="card border-0 card-inside d-flex flex-column justify-content-center align-items-center text-center py-3 px-4 m-3">
                            <b>Soal TWK</b> Total Soal: 30 <br> Alokasi Waktu: 30 Menit <br> Passing Grade: 65
                        </div>
                        <div class="card border-0 card-inside d-flex flex-column justify-content-center align-items-center text-center py-3 px-4 m-3">
                            <b>Soal TWK</b> Total Soal: 30 <br> Alokasi Waktu: 30 Menit <br> Passing Grade: 65
                        </div>
                        <div class="card border-0 card-inside d-flex flex-column justify-content-center align-items-center text-center py-3 px-4 m-3">
                            <b>Soal TWK</b> Total Soal: 30 <br> Alokasi Waktu: 30 Menit <br> Passing Grade: 65
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

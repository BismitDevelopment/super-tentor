@extends('layouts.app')
@section('navbar')
    @include('navbarDashboard')
@endsection


@section('content')
<link rel="stylesheet" href="{{ asset('css/tryoutsoal.css') }}">
<div class="wrapper">
    <div class="d-flex justify-content-between title flex-wrap">
        <h3 class="judul-paket">Try Out Serentak 01 - SKD</h3>
        <h5>Sisa Waktu: 1 Jam 30 Menit</h5>
    </div>
    <div class="d-flex menus col-12 p-0">
        <div class="menu px-3 px-lg-4 py-2 menu-twk" data-jenis="soal_twk">
            <h4>TWK</h4>
        </div>
        <div class="menu px-3 px-lg-4 py-2 menu-tiu" data-jenis="soal_tiu">
            <h4>TIU</h4>
        </div>
        <div class="menu px-3 px-lg-4 py-2 menu-tkp" data-jenis="soal_tkp">
            <h4>TKP</h4>
        </div>
    </div>
    <div class="d-flex soal flex-column flex-lg-row" data-jenis="soal_twk">
        <div class="d-flex flex-column">
            <div class="border rounded-bottom bg-white box mr-2 box-kiri box-soal mb-3" data-nomor="1">
                <div class="d-flex justify-content-between soal-atas">
                    <h4 class="nomor-soal" data-nomor="1">Soal 1</h4>
                    <div class="tandai d-flex">
                        <img src="{{ asset('img/mdi_flag.svg') }}" alt="">
                        <h4>Tandai</h4>
                    </div>
                </div>
                <div class="d-flex flex-column mt-3 text-justify">
                    <p class="mb-0 soal-isi" data-nomor="1">ISI SOAL
                    </p>
                    <form action="" class="d-flex flex-column ml-4 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-1" value="a">
                            <label class="form-check-label" for="1">
                                pilihan 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-2" value="b">
                            <label class="form-check-label" for="2">
                                pilihan 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-3" value="c">
                            <label class="form-check-label" for="3">
                                pilihan 3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-4" value="d">
                            <label class="form-check-label" for="4">
                                pilihan 4
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-5" value="e">
                            <label class="form-check-label" for="5">
                                pilihan 5
                            </label>
                        </div>                    
                    </form>
                </div>
            </div>    
            <div class="d-flex justify-content-center button-bawah">
                <button type="button" class="btn mx-2 btn-yellow px-3 btn-kembali mb-3" data-nomor="0">Kembali</button>
                <button type="button" class="btn mx-2 btn-green px-3 btn-selanjutnya mb-3" data-nomor="2">Selanjutnya</button>
            </div>    
        </div>
        <div class="d-flex justify-content-center box-kanan">
            <div class="border bg-white p-3 rounded nomor">
                <h5>Navigasi Soal TIU</h5>
                <div class="angka mt-4">
                    @for ($i = 1; $i <= 30; $i++)
                    <div class="box-angka" data-nomor="{{ $i }}">{{ $i }}</div>
                    @endfor
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a href=""><div class="button-tipe btn btn-green mt-2 py-2 px-4">
                        Tipe Soal Berikut
                    </div></a>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/tryoutsoal.js') }}"></script>
@endsection



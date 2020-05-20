@extends('layouts.app')

@section('meta')
    <meta name="paket_id" content="{{ $paket->id }}">
@endsection


@section('navbar')
    @include('navbarDashboard')
@endsection


@section('content')
<link rel="stylesheet" href="{{ asset('css/tryoutsoal.css') }}">
<div class="wrapper">
    <div class="d-flex justify-content-between title flex-wrap mb-lg-1 mb-3">
        <h3 class="judul-paket">Try Out Serentak 01 - SKD</h3>
        <h5 class="countdown"></h5>
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
        <div class="d-flex flex-column flex-lg-fill">
            <div class="border rounded-bottom bg-white box mr-2 box-kiri box-soal mb-3">
                <div class="d-flex justify-content-between soal-atas">
                    <h4 class="nomor-soal">Soal 1</h4>
                    <div class="tandai d-flex">
                        <img src="{{ asset('img/mdi_flag.svg') }}" alt="">
                        <h4>Tandai</h4>
                    </div>
                </div>
                <div class="d-flex flex-column mt-3 text-justify">
                    <p class="mb-0 soal-isi text-larger">
                    </p>
                    <form action="" class="d-flex flex-column ml-4 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-1" value="a">
                            <label class="form-check-label text-larger" for="1">
                                
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-2" value="b">
                            <label class="form-check-label text-larger" for="2">
                                
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-3" value="c">
                            <label class="form-check-label text-larger" for="3">
                                
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-4" value="d">
                            <label class="form-check-label text-larger" for="4">
                                
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="pilihan-5" value="e">
                            <label class="form-check-label text-larger" for="5">
                                
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
                    @for ($i = 1; $i <= 35; $i++)
                    <div class="box-angka" data-nomor="{{ $i }}">{{ $i }}</div>
                    @endfor
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <a class="finish-attempt"><div class="mt-2">
                        Finish Attempt
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



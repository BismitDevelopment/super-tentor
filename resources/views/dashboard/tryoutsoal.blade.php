@extends('layouts.app')
@section('navbar')
    @include('navbarDashboard')
@endsection


@section('content')
<link rel="stylesheet" href="{{ asset('css/tryoutsoal.css') }}">
<div class="wrapper">
    <div class="d-flex justify-content-between title flex-wrap">
        <h3>Try Out Serentak 01 - SKD</h3>
        <h5>Sisa Waktu: 1 Jam 30 Menit</h5>
    </div>
    <div class="d-flex menus col-12 p-0">
        <div class="menu px-3 px-lg-4 py-2">
            <h4>TWK</h4>
        </div>
        <div class="menu px-3 px-lg-4 py-2 menu-active">
            <h4>TIU</h4>
        </div>
        <div class="menu px-3 px-lg-4 py-2">
            <h4>TKP</h4>
        </div>
    </div>
    <div class="d-flex soal flex-column flex-lg-row">
        <div class="d-flex flex-column">
            @foreach ($soals as $soal)           
            <div class="border rounded-bottom bg-white box mr-2 box-kiri box-soal d-none mb-3" id="soal-{{ $soal["nomor"] }}">
                <div class="d-flex justify-content-between soal-atas">
                    <h4>Soal {{ $soal["nomor"] }}</h4>
                    <div class="tandai d-flex">
                        <img src="{{ asset('img/mdi_flag.svg') }}" alt="">
                        <h4>Tandai</h4>
                    </div>
                </div>
                <div class="d-flex flex-column mt-3 text-justify">
                    <p class="mb-0 soal-isi">{{ $soal["soal"] }}
                    </p>
                    <form action="" class="d-flex flex-column ml-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="1" value="a">
                            <label class="form-check-label" for="1">
                                {{ $soal["choiceA"] }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="2" value="b">
                            <label class="form-check-label" for="2">
                                {{ $soal["choiceB"] }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="3" value="c">
                            <label class="form-check-label" for="3">
                                {{ $soal["choiceC"] }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="4" value="d">
                            <label class="form-check-label" for="4">
                                {{ $soal["choiceD"] }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="choice" id="5" value="e">
                            <label class="form-check-label" for="5">
                                {{ $soal["choiceE"] }}
                            </label>
                        </div>                    
                    </form>
                </div>
            </div>    
            <div class="d-flex justify-content-center button-bawah">
                <button type="button" class="btn mx-2 btn-yellow px-3 btn-kembali d-none mb-3" data-soal="{{ $soal["nomor"] }}">Kembali</button>
                <button type="button" class="btn mx-2 btn-green px-3 btn-selanjutnya d-none mb-3" data-soal="{{ $soal["nomor"] }}">Selanjutnya</button>
            </div>    
            @endforeach        
        </div>
        <div class="d-flex justify-content-center box-kanan">
            <div class="border bg-white p-3 rounded nomor">
                <h5>Navigasi Soal TIU</h5>
                <div class="angka mt-4">
                    @for ($i = 1; $i <= 30; $i++)
                    <div class="box-angka" data-soal="{{ $i }}">{{ $i }}</div>
                    @endfor
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <div class="button-tipe mt-2 py-2 px-4">
                        Tipe Soal Berikut
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(".menu").click(function () {
        $(".menu").each(function() {
            $(this).removeClass("menu-active")
        }) 
        $(this).addClass("menu-active") 
    });
    $(document).ready(function () {  
        $("#soal-1").removeClass("d-none")
        $("#soal-1").next().children().each(function () { 
            $(this).removeClass("d-none")
        }) 
        $(".box-angka").eq(0).addClass("angka-active")
    });
    $(".box-angka").click(function () {  
        $(".box-angka").each(function() {
            $(this).removeClass("angka-active")
        }) 
        $(this).addClass("angka-active") 
        $(".box-soal").each(function () {  
            $(this).addClass("d-none")
        })
        $("#soal-"+$(this).data("soal")).removeClass("d-none")
        $(".button-bawah").children().each(function () {  
            $(this).addClass("d-none")
        })
        $("#soal-"+$(this).data("soal")).next().children().each(function () { 
            $(this).removeClass("d-none")
        }) 
    });
    $(".tandai").click(function () {  
        const soal = $(this)
        $(".box-angka").each(function () {  
            if (soal.parent().parent().attr("id") == "soal-"+$(this).data("soal")) {
                $(this).toggleClass("angka-marked")
            }
        })
    })
    $(".btn-kembali").click(function () {
        let noSoal = $(this).data("soal")
        if (parseInt(noSoal) > 1) {
            $(".box-angka").each(function() {
            $(this).removeClass("angka-active")
            }) 
            $(`.box-angka[data-soal=${noSoal-1}]`).addClass("angka-active")
        }
        $(".box-soal").each(function () {  
            $(this).addClass("d-none")
        })
        $("#soal-"+ parseInt($(this).data("soal")-1)).removeClass("d-none")
        $(".button-bawah").children().each(function () {  
            $(this).addClass("d-none")
        })
        $("#soal-"+parseInt($(this).data("soal")-1)).next().children().each(function () { 
            $(this).removeClass("d-none")
        }) 
    });
    $(".btn-selanjutnya").click(function () {
        let noSoal = $(this).data("soal")
        if (parseInt(noSoal) < 30) {
            $(".box-angka").each(function() {
            $(this).removeClass("angka-active")
            }) 
            $(`.box-angka[data-soal=${noSoal+1}]`).addClass("angka-active")
        }
        $(".box-soal").each(function () {  
            $(this).addClass("d-none")
        })
        $("#soal-"+ parseInt($(this).data("soal")+1)).removeClass("d-none")
        $(".button-bawah").children().each(function () {  
            $(this).addClass("d-none")
        })
        $("#soal-"+parseInt($(this).data("soal")+1)).next().children().each(function () { 
            $(this).removeClass("d-none")
        }) 
    });
</script>
@endsection



<link rel="stylesheet" href="{{ asset('css/verify.css') }}">

@extends('layouts.app')

@section('navbar')
@include('navbarDashboard')
@endsection

<style>
    body {
        background-image: url('{{ asset('img/bg-sun-tornado.svg') }}');
        background-size: cover;
        font-size: 12px;
    }
    .out {
        color: #fff;
        line-height: 2;
    }
    .card {
        border: none !important;
        background: rgba(0, 0, 0, 0.25) !important;
        border-radius: 2em !important; 
    }
    .btn-primary {
        background-color: #E9D038 !important;
        color: #fff !important;
        border: none !important;
        font-weight: bold !important;
        border-radius: 1.2em !important;
    }
</style>

@section('content')
<div class="out">
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
            <div class="card py-3 px-2 mt-4">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <h2 class="font-weight-bold mb-4">Verifikasi Akun</h2>
                    <p class="font-weight-bold text-center mb-4">
                        Kita telah mengirimkan kode verifikasi, silahkan buka email anda untuk mengkormirmasi akun anda!
                        Jika kamu tidak menerima email dari kami silakan klik tombol dibawah untuk mengirim ulang tautan verifikasi.
                    </p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary px-4 py-2">Kirim Verifikasi Ulang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


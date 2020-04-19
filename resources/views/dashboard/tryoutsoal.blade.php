@extends('layouts.app')

@section('meta')
    <meta name="paket_id" content="{{ $paket->id }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/soalTryout.js') }}"></script>
@endsection

@section('navbar')
    @include('navbarDashboard')
@endsection


@section('content')
<link rel="stylesheet" href="{{ asset('css/tryouthome.css') }}">
<div class="wrapper">
    
</div>
</div>
@endsection

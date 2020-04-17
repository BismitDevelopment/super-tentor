@extends('layouts.app')

@section('navbar')
    @include('navbarDashboard')
@endsection
@section('content')
    <h3>Tryout Free</h3>
    @foreach ($pakets as $paket)
        
            {{ $paket->nama }}
        
    @endforeach
@endsection
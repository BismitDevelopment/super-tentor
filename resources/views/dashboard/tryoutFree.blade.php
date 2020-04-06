@extends('layouts.app')
@include('navbarDashboard')
<style>
  .main {
    margin: 0;
    padding: 0 4.5em;
    height: 100%;
  }

  .page-header {
    margin: 0;
    font-weight: 600;
    font-size: 1.7em;
  }

  .header-underline {
    margin-top: .5em;
    width: 13em;
    border: 1px solid #E0E0E0;
  }

  .tryout-box {
    background: #FFFFFF;
    border: 1px solid #E5E5E5;
    box-sizing: border-box;
    border-radius: 10px;
    width: 100%;
    padding: 1.5em 3em;
    margin: 1.5em 0;
  }

  .tryout-box img {
    background: #C4C4C4;
    padding: 1.2em 1.3em;
  }

  .buttons a {
    color: white;
    font-weight: 600;
    font-size: 1.2em;
    padding: .5em 1.5em;
    border-radius: .6em;
    margin: 0 .8em;
  }

  .buttons a:hover {
    text-decoration: none;
    color: white;
  }

  .buttons a:nth-child(1) {
    background: #E9D038;
  }

  .buttons a:nth-child(1):hover {
    background: #A79526;
  }

  .buttons a:nth-child(2) {
    background: #67A69D;
  }

  .buttons a:nth-child(2):hover {
    background: #45716B;
  }

  .tryout-name {
    font-size: 1.3em;
    font-weight: 600;
    margin: 0 2em;
  }

  .left {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  @media (max-width: 992px) {
    .buttons a {
      margin: 0 .5em;
    }
  }

  @media (max-width: 920px) {
    .left {
      flex-direction: column;
    }

    .buttons a {
      font-size: 1.2em;
      padding: .5em 1em;
      margin: 0 .2em;
    }

    .buttons {
      margin-top: 1em;
    }
  }

  @media (max-width: 420px) {
    .main {
      font-size: .5em;
    }
  }
</style>

@section('content')
  <div class="main d-flex flex-column align-items-start">
    <div class="d-flex flex-column align-items-center">
      <h1 class="page-header">Tryout Free</h1>
      <div class="header-underline"></div>
    </div>

    {{-- Start for loop --}}
    <div class="tryout-box d-flex align-items-center justify-content-between">
      <img src="/img/paper.svg" alt="">
      {{-- Tryout Title --}}
      <div class="left d-flex align-items-center justify-content-between">
        <h2 class="tryout-name">Try Out Serentak 01 - SKD</h2>
        <div class="buttons">
          <a href="">Rangking</a>
          <a href="">Uji Tryout</a>
        </div>
      </div>
    </div>
    {{-- End for loop --}}
  </div>
@endsection
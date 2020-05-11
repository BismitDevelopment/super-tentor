@extends('layouts.app')
@include('navbarDashboard')
<style>
  .parent {
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
    margin: 1em 0;
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

  iframe.width-changed {
    width: 100%;
    display: block;
    border: 0;
    height: 0;
    margin: 0;
  }

  #custom-container {
    width: 100%;
  }

  @media (max-width: 992px) {
    .buttons a {
      margin: 0 .5em;
    }
  }

  @media (max-width: 930px) {
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
    .parent {
      font-size: .5em;
    }
  }
</style>

@section('content')
  <div class="parent d-flex flex-column align-items-start">
    <div class="d-flex flex-column align-items-center">
      @if ($jenis_tryout === 0)
        <h1 class="page-header">Tryout Free</h1>
      @elseif ($jenis_tryout === 1)
        <h1 class="page-header">Tryout Premium</h1>
      @else
        <h1 class="page-header">Tryout Nasional</h1>
      @endif
      <div class="header-underline"></div>
    </div>

    @foreach($pakets as $paket)
    <div id="custom-container">
      <div class="tryout-box d-flex align-items-center justify-content-between">
        <img src="/img/paper.svg" alt="">
        <div class="left d-flex align-items-center justify-content-between">
          <h2 class="tryout-name">{{$paket->nama}}</h2>
          <div class="buttons">
            <a class="button" href="/ranking">Ranking</a>
            @if ($paket->jenis_tryout === 0)
              <a class="button" href="{{ route('home.tryouts.free.show', ['paket'=>$paket->id]) }}">Uji Tryout</a>
            @elseif ($paket->jenis_tryout === 1)
              <a class="button" href="{{ route('home.tryouts.premium.show', ['paket'=>$paket->id]) }}">Uji Tryout</a>
            @else
              <a class="button" href="{{ route('home.tryouts.nasional.show', ['paket'=>$paket->id]) }}">Uji Tryout</a>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection

@section('scripts')
<script>
  console.log("connected!")
  $(document).ready(function () {
    $.event.special.widthChanged = {
          remove: function() {
              $(this).children('iframe.width-changed').remove();
          },
          add: function () {
              var elm = $(this);
              var iframe = elm.children('iframe.width-changed');
              if (!iframe.length) {
                  iframe = $('<iframe/>').addClass('width-changed').prependTo(this);
              }
              var oldWidth = elm.width();
              function elmResized() {
                  var width = elm.width();
                  if (oldWidth != width) {
                      elm.trigger('widthChanged', [width, oldWidth]);
                      oldWidth = width;
                  }
              }
  
              var timer = 0;
              var ielm = iframe[0];
              (ielm.contentWindow || ielm).onresize = function() {
                  clearTimeout(timer);
                  timer = setTimeout(elmResized, 20);
              };
          }
      }
  
      $('#custom-container').on('widthChanged',function(){
          const width = $(this).width();
          if (width <= 420) {
            $(".parent").css({
              "font-size": ".5em"
            })
  
            $(".left").css({
              "flex-direction": "column"
            })
          }
  
          else if (width <= 930) {
            $(".parent").css({
              "font-size": "1em",
            })
  
            $(".left").css({
              "flex-direction": "column"
            })
            $(".button").css({
              "font-size" : "1.2em",
              "padding": ".5em 1em",
              "margin" : "0 .2em"
            })
            $(".buttons").css({
              "margin-top": "1em"
            })
          } 
  
          else if (width <= 992) {
            $(".button").css({
              "margin": "0 .5em",
            })
  
            $(".left").css({
              "flex-direction": "row",
            })
  
          } else {
            $(".button").css({
              "color": "white",
              "font-weight": "600",
              "font-size": "1.2em",
              "padding": ".5em 1.5em",
              "border-radius": ".6em",
              "margin": "0 .8em"
            }) 
  
            $(".buttons").css({
              "margin-top": "0"
            })
  
            $(".parent").css({
              "margin": "0",
              "padding": "0 4.5em",
              "height": "100%",
              "font-size": "1em",
            }) 
  
            $(".left").css({
              "width": "100%",
              "display": "flex",
              "justify-content": "space-between",
              "align-items": "center",
              "flex-direction": "row",
            }) 
          }
      });
  })
</script>
@endsection
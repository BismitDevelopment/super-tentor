<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaketSoal;

class TryoutController extends Controller
{
    //
    private function index(PaketSoal $pakets, int $jenis_tryout){
        
    }
    public function indexFree(){
        $pakets = PaketSoal::where('jenis_tryout', 0)->get();
        $jenis_tryout = 0;

        return view('dashboard.tryoutList', compact('pakets', 'jenis_tryout'));
    }
    
    public function indexPremium(){
        $pakets = PaketSoal::where('jenis_tryout', 1)->get();
        $jenis_tryout = 1;

        return view('dashboard.tryoutList', compact('pakets', 'jenis_tryout'));
    }

    public function indexNasional(){
        $pakets = PaketSoal::where('jenis_tryout', 2)->get();
        $jenis_tryout = 2;

        return view('dashboard.tryoutList', compact('pakets', 'jenis_tryout'));
    }
}

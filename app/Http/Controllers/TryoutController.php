<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaketSoal;

class TryoutController extends Controller
{
    //
    public function indexFree(){
        $pakets = PaketSoal::where('jenis_tryout', 0)->get();

        return view('tryout.free', compact('pakets'));
    }
}

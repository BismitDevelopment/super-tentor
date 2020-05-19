<?php

namespace App\Http\Controllers;

use App\PaketSoal;
use Illuminate\Http\Request;

class PaketSoalController extends Controller
{
    private function getSoalJSON(PaketSoal $paket, int $jenis_tryout_need){
        if ($paket->jenis_tryout === $jenis_tryout_need) {
            # code...
            $paket = $paket->with('soalTkp', 'soalTiu', 'soalTwk')->get()->first();
            
            return response()->json([
                'error'=>false,
                'paket'=>$paket
            ], 200);
        } else {
            
            return response()->json([
                'error'=>true
            ], 422);
        }
    }

    public function showFree(PaketSoal $paket){

        if ($paket->jenis_tryout === 0) {
            # code...
            return view('dashboard.tryouthome', compact('paket'));
        } else {
            return redirect('home.tryouts.free');
        }
    }

    public function ujianFree(Request $request) {
        //
        $paket = PaketSoal::find($request->paket);
        
        if ($request->isMethod('post')) {
            return $this->getSoalJSON($paket, 0);

        } else {
            
            return view('dashboard.tryoutsoal', compact('paket'));
        }
    }

    public function showPremium(PaketSoal $paket){

        if ($paket->jenis_tryout === 1) {
            # code...
            return view('dashboard.tryouthome', compact('paket'));
        } else {
            return redirect('home.tryouts.premium');
        }
    }

    public function ujianPremium(Request $request) {
        //
        $paket = PaketSoal::find($request->paket);
        
        if ($request->isMethod('post')) {
            # code...
            return $this->getSoalJSON($paket, 1);

        } else {
            
            return view('dashboard.tryoutsoal', compact('paket'));
        }
    }

    public function showNasional(PaketSoal $paket){

        if ($paket->jenis_tryout === 2) {
            # code...
            return view('dashboard.tryouthome', compact('paket'));
        } else {
            return redirect('home.tryouts.nasional');
        }
    }

    public function ujianNasional(Request $request) {
        //
        $paket = PaketSoal::find($request->paket);
        
        if ($request->isMethod('post')) {
            # code...
            return $this->getSoalJSON($paket, 2);

        } else {
            
            return view('dashboard.tryoutsoal', compact('paket'));
        }
    }

    public function finishAttempt(Request $request){
        //TO-DO calculate score redirect to
        $jawaban_tius = $request->input('soal_tius');
        $jawaban_tkps = $request->input('soal_tkps');
        $jawaban_twks = $request->input('soal_twks');
    }
}

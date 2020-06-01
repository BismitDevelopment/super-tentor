<?php

namespace App\Http\Controllers;

use App\Simulation;
use App\PaketSoal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    private function getJsonDataSoal(PaketSoal $paket, Simulation $simulation){
        $paket->soalTiu;
        $paket->soalTwk;
        $paket->soalTkp;
        
        return response()->json([
            'error' => false,
            'data_user'=> [
                'jawaban_tkp' => $simulation->array_jawaban_tkp,
                'jawaban_tiu' => $simulation->array_jawaban_tiu,
                'jawaban_twk' => $simulation->array_jawaban_twk,
            ],
            'data_soal'=> $paket
        ], 200);
    }

    public function pembahasanFree(Request $request, PaketSoal $paket, Simulation $simulation){
        $user = Auth::user();
        if (($user->id === $simulation->user_id) && ($simulation->paket_id === $paket->id) && ($paket->jenis_tryout === 0)) {
            # code...
            if($request->isMethod('post')){

                return $this->getJsonDataSoal($paket, $simulation);

            } else {
                return view('dashboard.pembahasan');
            }
        } else {
            if($request->isMethod('post')){
                return response()->json([
                    'error'=>true
                ], 422);
            } else {
                return redirect(route('home.index'));
            }
        }
    }

    public function pembahasanPremium(Request $request, PaketSoal $paket, Simulation $simulation){
        $user = Auth::user();
        if (($user->id === $simulation->user_id) && ($simulation->paket_id === $paket->id) && ($paket->jenis_tryout === 1)) {
            # code...
            if($request->isMethod('post')){

                return $this->getJsonDataSoal($paket, $simulation);

            } else {
                return view('dashboard.pembahasan');
            }
        } else {
            if($request->isMethod('post')){
                return response()->json([
                    'error'=>true
                ], 422);
            } else {
                return redirect(route('home.index'));
            }
        }
    }

    public function pembahasanNasional(Request $request, PaketSoal $paket, Simulation $simulation){
        $user = Auth::user();
        if (($user->id === $simulation->user_id) && ($simulation->paket_id === $paket->id) && ($paket->jenis_tryout === 2)) {
            # code...
            if($request->isMethod('post')){

                return $this->getJsonDataSoal($paket, $simulation);

            } else {
                return view('dashboard.pembahasan');
            }
        } else {
            if($request->isMethod('post')){
                return response()->json([
                    'error'=>true
                ], 422);
            } else {
                return redirect(route('home.index'));
            }
        }
    }

}

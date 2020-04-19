<?php

namespace App\Http\Controllers;

use App\PaketSoal;
use Illuminate\Http\Request;

class PaketSoalController extends Controller
{

    public function showFree(PaketSoal $paket){

        return view('dashboard.tryouthome', compact('paket'));
    }

    public function ujianFree(Request $request) {
        //
        $paket = PaketSoal::find($request->paket);
        
        if ($request->isMethod('post')) {
            # code...
            if ($paket->jenis_tryout === 0) {
                # code...
                
                $paket = $paket->with('soalTkp', 'soalTiu', 'soalTwk')->get()->first();
                // $json = $paket->toJson();
                return response()->json([
                    'error'=>false,
                    'paket'=>$paket
                ], 200);
        
            } else {
    
                return response()->json([
                    'error'=>true
                ], 422);
            }
        } else {
            
            return view('dashboard.tryouthome', compact('paket'));
        }
    }

}

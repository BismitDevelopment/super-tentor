<?php

namespace App\Http\Controllers;

use App\PaketSoal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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

    private function getUsersRankSorted(PaketSoal $paket){
        
            $usersRank = $paket->usersSimulation->unique('id')->values();
            $usersRankSorted = $usersRank->sortByDesc(function ($item, $key){
                return $item['user_simulation']->total_skor;
            })->values();           
            
            return $usersRankSorted;
    }

    private function getCurrentUserRank(User $user, Collection $sortedRankList){
        
        foreach ($sortedRankList as $key => $value) {
                # code...
                if($value->id === $user->id){
                    return $key+1;
                }
        }
        return 0;    
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
        
        if($paket->jenis_tryout === 0){
            if ($request->isMethod('post')) {
                return $this->getSoalJSON($paket, 0);
    
            } else {
                
                return view('dashboard.tryoutsoal', compact('paket'));
            }
        } else {

            return redirect('home.tryouts.free');
        }
    }

    public function rankingFree(PaketSoal $paket, int $page=1){

        if($paket->jenis_tryout === 0){
            $user = Auth::user();
            $usersRankSorted = $this->getUsersRankSorted($paket);
            $currentUserRank = $this->getCurrentUserRank($user, $usersRankSorted);

            $userRankList = $usersRankSorted->forPage($page, 10);
            $pages = ceil(count($usersRankSorted) / 10);

            if(($page > $pages || $page < 1)&& $pages !== 0.0){
                return redirect(route('home.tryouts.free.ranking', ['paket' => $paket->id]));
            } else {
                return view('dashboard.ranking', compact('paket','userRankList', 'page', 'pages', 'currentUserRank'));
            }
        } else {
            return redirect('home.tryout.nasional');
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
        
        if($paket->jenis_tryout === 1){
            if ($request->isMethod('post')) {
                # code...
                return $this->getSoalJSON($paket, 1);

            } else {
                
                return view('dashboard.tryoutsoal', compact('paket'));
            }
        } else {

            return redirect('home.tryouts.free');
        }
    }

    public function rankingPremium(PaketSoal $paket, int $page=1){

        if($paket->jenis_tryout === 1){
            $user = Auth::user();
            $usersRankSorted = $this->getUsersRankSorted($paket);
            $currentUserRank = $this->getCurrentUserRank($user, $usersRankSorted);

            $userRankList = $usersRankSorted->forPage($page, 10);
            $pages = ceil(count($usersRankSorted) / 10);

            if(($page > $pages || $page < 1) && $pages !== 0.0){
                return redirect(route('home.tryouts.premium.ranking', ['paket' => $paket->id]));
            } else {
                return view('dashboard.ranking', compact('paket','userRankList', 'page', 'pages', 'currentUserRank'));
            }
        } else {
            return redirect('home.tryout.nasional');
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
        
        if($paket->jenis_tryout === 2){
            if ($request->isMethod('post')) {
                # code...
                return $this->getSoalJSON($paket, 2);

            } else {
                
                return view('dashboard.tryoutsoal', compact('paket'));
            }
        } else {

            return redirect('home.tryouts.nasional');
        }
    }

    public function rankingNasional(PaketSoal $paket, int $page=1){

        if($paket->jenis_tryout === 2){
            $user = Auth::user();
            $usersRankSorted = $this->getUsersRankSorted($paket);
            $currentUserRank = $this->getCurrentUserRank($user, $usersRankSorted);

            $userRankList = $usersRankSorted->forPage($page, 10);
            $pages = ceil(count($usersRankSorted) / 10);

            if(($page > $pages || $page < 1) && $pages !== 0.0){
                return redirect(route('home.tryouts.nasional.ranking', ['paket' => $paket->id]));
            } else {
                return view('dashboard.ranking', compact('paket','userRankList', 'page', 'pages', 'currentUserRank'));
            }

        } else {
            return redirect('home.tryout.nasional');
        }
    }   

    public function finishAttempt(Request $request){
        //TO-DO calculate score redirect to
        $jawaban_tius = $request->input('soal_tius');
        $jawaban_tkps = $request->input('soal_tkps');
        $jawaban_twks = $request->input('soal_twks');
    }
}

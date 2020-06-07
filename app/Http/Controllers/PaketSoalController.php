<?php

namespace App\Http\Controllers;

use App\PaketSoal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class PaketSoalController extends Controller
{
    private function getSoalJSON(PaketSoal $paket){
            # code...
            $paket->soalTkp;
            $paket->soalTiu;
            $paket->soalTwk;
            
            return response()->json([
                'error'=>false,
                'paket'=>$paket
            ], 200);
        
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
            return redirect(route('home.tryouts.free.index'));
        }
    }

    public function ujianFree(Request $request) {
        //
        $paket = PaketSoal::find($request->paket);
        
        if($paket->jenis_tryout === 0){
            if ($request->isMethod('post')) {
                return $this->getSoalJSON($paket);
    
            } else {
                
                return view('dashboard.tryoutsoal', compact('paket'));
            }
        } else {
            if($request->isMethod('post')){
                return response()->json([
                    'error'=>true
                ], 422);
            } else {

                return redirect(route('home.tryouts.free.index'));
            }
        }
    }

    public function rankingFree(PaketSoal $paket, int $page=1){
        if($paket->jenis_tryout === 0){
            $user = Auth::user();
            $usersRankSorted = $this->getUsersRankSorted($paket);
            $currentUserRank = $this->getCurrentUserRank($user, $usersRankSorted);

            $userRankList = $usersRankSorted->forPage($page, 10)->values();
            $pages = ceil(count($usersRankSorted) / 10);

            if(($page > $pages || $page < 1)&& $pages !== 0.0){
                return redirect(route('home.tryouts.free.ranking', ['paket' => $paket->id]));
            } else {
                return view('dashboard.ranking', 
                    compact('paket','userRankList', 'page', 'pages', 
                        'currentUserRank', 'usersRankSorted'));
            }
        } else {
            return redirect(route('home.tryouts.free.index'));
        }
    }   

    public function showPremium(PaketSoal $paket){

        if ($paket->jenis_tryout === 1) {
            # code...
            return view('dashboard.tryouthome', compact('paket'));
        } else {
            return redirect(route('home.tryouts.premium.index'));
        }
    }

    public function ujianPremium(Request $request) {
        //
        $paket = PaketSoal::find($request->paket);
        
        if($paket->jenis_tryout === 1){
            if ($request->isMethod('post')) {
                # code...
                return $this->getSoalJSON($paket);

            } else {
                
                return view('dashboard.tryoutsoal', compact('paket'));
            }
        } else {

            if($request->isMethod('post')){
                return response()->json([
                    'error'=>true
                ], 422);
            } else {
                return redirect(route('home.tryouts.premium.index'));
            }
        }
    }

    public function rankingPremium(PaketSoal $paket, int $page=1){

        if($paket->jenis_tryout === 1){
            $user = Auth::user();
            $usersRankSorted = $this->getUsersRankSorted($paket);
            $currentUserRank = $this->getCurrentUserRank($user, $usersRankSorted);

            $userRankList = $usersRankSorted->forPage($page, 10)->values();
            $pages = ceil(count($usersRankSorted) / 10);

            if(($page > $pages || $page < 1) && $pages !== 0.0){
                return redirect(route('home.tryouts.premium.ranking', ['paket' => $paket->id]));
            } else {
                return view('dashboard.ranking', 
                    compact('paket','userRankList', 'page', 'pages', 
                        'currentUserRank', 'usersRankSorted'));
            }
        } else {
            return redirect(route('home.tryouts.premium.index'));
        }
    }   

    public function showNasional(PaketSoal $paket, String $password){

        if ($paket->jenis_tryout === 2 & $paket->password === $password) {
            # code...
            return view('dashboard.tryouthome', compact('paket'));
        } else {
            return redirect(route('home.tryouts.nasional.index'));
        }
    }

    public function ujianNasional(Request $request) {
        //
        $paket = PaketSoal::find($request->paket);
        
        if($paket->jenis_tryout === 2 & $request->password === $paket->password){
            if ($request->isMethod('post')) {
                # code...
                return $this->getSoalJSON($paket);

            } else {
                return view('dashboard.tryoutsoal', compact('paket'));
            }
        } else {

            if($request->isMethod('post')){
                return response()->json([
                    'error'=>true
                ], 422);
            } else {
                return redirect(route('home.tryouts.nasional.index'));
            }
        }
    }

    public function rankingNasional(PaketSoal $paket, int $page=1){
        if($paket->jenis_tryout === 2){
            $user = Auth::user();
            $usersRankSorted = $this->getUsersRankSorted($paket);
            $currentUserRank = $this->getCurrentUserRank($user, $usersRankSorted);

            $userRankList = $usersRankSorted->forPage($page, 10)->values();
            $pages = ceil(count($usersRankSorted) / 10);

            if(($page > $pages || $page < 1) && $pages !== 0.0){
                return redirect(route('home.tryouts.nasional.ranking', ['paket' => $paket->id]));
            } else {
                return view('dashboard.ranking', 
                    compact('paket','userRankList', 'page', 'pages', 
                        'currentUserRank', 'usersRankSorted'));
            }

        } else {
            return redirect(route('home.tryouts.nasional.index'));
        }
    }   

    public function finish(Request $request, int $paket, String $password = null){
        $paket_soal = PaketSoal::find($paket);
        if ($request->input('id_paket') === $paket & $paket_soal->password === $password ) {
            # code...
            $durasiUjianSeconds = $request->input('waktu_dihabiskan');
            $durasiUjianFormatted = date('H:i:s', $durasiUjianSeconds - (7 * 60 * 60));
            
            # Store Array Jawaban to simualtion table
            $arrJawabanTiu = $request->input('jawaban_tiu');
            $arrjawabanTkp = $request->input('jawaban_tkp');
            $arrJawabanTwk = $request->input('jawaban_twk');
            
            #Calculate and store score to simulation table
            $arrScoreTkp = $request->input('score_jawaban_tkp');
            $arrScoreTwk = $request->input('score_jawaban_twk');
            $arrScoreTiu = $request->input('score_jawaban_tiu');
            $arrScores = array(
                'score_tiu'=>$arrScoreTiu, 
                'score_tkp'=>$arrScoreTkp,
                'score_twk'=>$arrScoreTwk
            );
            
            $totalScoreTkp = 0;
            $totalScoreTwk = 0;
            $totalScoreTiu = 0;
            $totalScoreUjian = 0;
            
            foreach ($arrScores as $key1 => $arrScoreType) {
                # code...
                $tempScore = 0;
                
                foreach ($arrScoreType as $key2 => $score) {
                    # code...
                    $tempScore += $score;
                    unset($score);
                    unset($key2);
                }
                
                if (strcmp($key1, 'score_tiu') === 0) {
                    # code...
                    $totalScoreTiu = $tempScore;
                    $totalScoreUjian += $totalScoreTiu;
                } elseif (strcmp($key1, 'score_twk') === 0) {
                    # code...
                    $totalScoreTwk = $tempScore;
                    $totalScoreUjian += $totalScoreTwk;
                } else {
                    $totalScoreTkp = $tempScore;
                    $totalScoreUjian += $totalScoreTkp;
                }
            }

            $status = 'Tidak Lulus';
            if ($totalScoreTkp >= 126 && $totalScoreTiu >= 80 && $totalScoreTwk >= 65) {
                # code...
                $status = 'Lulus';
            }

            $user = Auth::user();
            $user->simulations()->attach($paket, [
                'skor_tiu' => $totalScoreTiu,
                'skor_twk' => $totalScoreTwk,
                'skor_tkp' => $totalScoreTkp,
                'status' => $status,
                'durasi_ujian' => $durasiUjianFormatted,
                'total_skor' => $totalScoreUjian,
                'array_jawaban_twk' => json_encode($arrJawabanTwk),
                'array_jawaban_tiu' => json_encode($arrJawabanTiu),
                'array_jawaban_tkp' => json_encode($arrjawabanTkp)
                ]);

            return response()->json([
                'error'=>false,
                'redirect'=>route('home.index')
            ], 200);

        } else {
            return response()->json([
                'error'=>true
            ], 422);
        }

    }
}

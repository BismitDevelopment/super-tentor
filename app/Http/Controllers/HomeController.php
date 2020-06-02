<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\PaketSoal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(int $page=1)
    {
        $user = Auth::user();
        
        $data = [
            'notif' => [
              'header' => 'Dashboard',
              'name' => $user->name,
              'notif-title' => 'Tryout Nasional',
              'notif-timer' => 5,
              'notif-content' => 'Tryout nasional akan diadakan secara serentak pada tanggal 17 April 2020. Password untuk memasuki tryout nasional terdapat pada notifikasi pengguba labla',
            ],
        ];
        
        // $user = User::with('simulations')->find(2);
        $user_simulations = $user->simulations;
        $user_simulations_per_page = $user_simulations->forPage($page, 5);
        
        $user_pakets_free = $user_simulations->filter(function ($value, $key){
            return $value->jenis_tryout === 0;
        });

        $user_pakets_free_per_type = $user_pakets_free->unique('paket_id');

        $user_pakets_premium = $user_simulations->filter(function ($value, $key){
            return $value->jenis_tryout === 1;
        });

        $user_pakets_premium_per_type = $user_pakets_premium->unique('paket_id');

        $pages = ceil(count($user_simulations) / 5);
        if(($page > $pages || $page < 1) && $pages !== 0.0){

            return redirect(route('home.index'));

        } else {

            $paket_free = PaketSoal::where('jenis_tryout', 0)->get();
            $paket_premium = PaketSoal::where('jenis_tryout', 1)->get();
    
            $progress = [
                'header' => 'Progress Tryout',
                'data' => [
                    [
                        'title' => 'Tryout Free',
                        'total' => count($paket_free),
                        'progress' => count($user_pakets_free_per_type),
                        'bar-width' => (count($user_pakets_free_per_type)===0) ? 0 : count($user_pakets_free_per_type)/count($paket_free)*100,
                    ],
                    [
                        'title' => 'Tryout Premium',
                        'total' => count($paket_premium),
                        'progress' => count($user_pakets_premium),
                        'bar-width' => (count($user_pakets_premium_per_type)===0) ? 0 : count($user_pakets_premium_per_type)/count($paket_premium)*100,
                    ],
                    [
                        'title' => 'Tryout Nasional',
                    ]
                ]
            ];
    
            $data = array_merge($data, array('progress'=>$progress));
            

            return view('home', compact('data', 'user_simulations_per_page', 'pages', 'page'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        $dashboardHomeData = [
            'notif' => [
              'header' => 'Dashboard',
              'name' => 'Pengguna 008!',
              'notif-title' => 'Tryout Nasional',
              'notif-timer' => 5,
              'notif-content' => 'Tryout nasional akan diadakan secara serentak pada tanggal 17 April 2020. Password untuk memasuki tryout nasional terdapat pada notifikasi pengguba labla',
            ],
            'progress' => [
                'header' => 'Progress Tryout',
                'data' => [
                    [
                        'title' => 'Tryout Free',
                        'total' => 2,
                        'progress' => 1,
                        'bar-width' => 1/2*100,
                    ],
                    [
                        'title' => 'Tryout Premium',
                        'total' => 30,
                        'progress' => 10,
                        'bar-width' => 10/30*100,
                    ],
                    [
                        'title' => 'Tryout Nasional',
                    ]
                ]
            ],
            'simulasi' => [
                'header' => 'Progress Tryout',
                'tableHeader' => [
                    'Tanggal',
                    'Judul dan Tipe',
                    'Waktu Pengerjaan',
                    'Poin',
                    'Status',
                    'Pembahasan',
                ],
                'data' => [
                    [
                        'tanggal' => '4/15/2020',
                        'judul' => 'Try Out Serentak 01 - SKD',
                        'tipe' => 'FREE',
                        'waktu' => '1:00:00',
                        'twk' => 0,
                        'tiu' => 0,
                        'tkp' => 0,
                        'total' => 0,
                        'status' => 'Tidak Lulus',
                    ],
                ],
            ],
        ];
        return view('home', ['data' => $dashboardHomeData]);
    }

    public function ranking() {
        return view('dashboard.ranking');
    }
}

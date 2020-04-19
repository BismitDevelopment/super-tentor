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
        return view('home');
    }

    //route for free tryout
    // public function tryout_free() {
    //     $temp_data = [
    //         "Try Out Serentak 01 - SKD",
    //         "Try Out Serentak 02 - SKD",
    //         "Try Out Serentak 03 - SKD",
    //         "Try Out Serentak 04 - SKD",
    //         "Try Out Serentak 05 - SKD"
    //     ];
    //     return view('dashboard.tryoutFree',['tests'=>$temp_data]);
    // }

    public function tryouthome()
    {
        return view('dashboard.tryouthome');
    }
}

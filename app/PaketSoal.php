<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PaketSoal extends Model
{

    protected $hidden = [

        'updated_at', 'created_at'
    ];

    public function soalTiu(){

        return $this->hasMany('App\SoalTiu', 'paket_id');
    }

    public function soalTwk(){

        return $this->hasMany('App\SoalTwk', 'paket_id');
    }

    public function soalTkp(){
        
        return $this->hasMany('App\SoalTkp', 'paket_id');
    }

    public function usersSimulation(){

        return $this->belongsToMany('App\User', 'simulations', 'paket_id', 'user_id')
                    ->withPivot([
                        'id',
                        'skor_tiu',
                        'skor_twk',
                        'skor_tkp',
                        'total_skor',
                        'status',
                        'durasi_ujian',
                        'created_at'
                        ])
                    ->as('user_simulation')
                    ->withTimestamps();
    }


}
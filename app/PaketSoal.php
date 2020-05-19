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

    public function usersSimulations(){

        return $this->belongsToMany('App\User', 'simulations', 'paket_id', 'user_id')
                    ->withPivot([
                        'total_skor',
                        'durasi_ujian'
                        ])
                    ->withTimestamps();
    }


}
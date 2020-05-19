<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SoalTwk extends Model
{
    protected $hidden = [
        'paket_id','pilihan_1','pilihan_2','pilihan_3','pilihan_4','jawaban','skor','updated_at', 'created_at'
    ];

    protected $appends = ['pilihan'];

    public function getPilihanAttribute(){
        $pilihan = array(
            array($this->pilihan_1, 0),
            array($this->pilihan_2, 0),
            array($this->pilihan_3, 0),
            array($this->pilihan_4, 0),
            array($this->jawaban, $this->skor)
        );
        shuffle($pilihan);
        return $pilihan;
    }
    
    public function paket(){

        return $this->belongsTo('App\PaketSoal','paket_id');
    }
}

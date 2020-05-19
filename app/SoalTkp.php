<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SoalTkp extends Model
{
    protected $hidden = [
        'paket_id','pilihan_1','pilihan_2','pilihan_3','pilihan_4','pilihan_5',
        'skor_1','skor_2','skor_3','skor_4','skor_5', 'created_at'
    ];

    protected $appends = ['pilihan'];

    public function getPilihanAttribute(){
        $pilihan = array(
            array($this->pilihan_1, $this->skor_1),
            array($this->pilihan_2, $this->skor_2),
            array($this->pilihan_3, $this->skor_3),
            array($this->pilihan_4, $this->skor_4),
            array($this->jawaban, $this->skor_5)
        );
        shuffle($pilihan);
        return $pilihan;
    }
    
    public function paket(){

        return $this->belongsTo('App\PaketSoal','paket_id');
    }
}

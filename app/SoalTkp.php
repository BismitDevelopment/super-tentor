<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SoalTkp extends Model
{
    protected $hidden = [
        'paket_id','pilihan_1','pilihan_2','pilihan_3','pilihan_4','pilihan_5',
        'skor_1','skor_2','skor_3','skor_4','skor_5', 'created_at'
    ];

    protected $appends = ['pilihan', 'jawaban'];

    public function getPilihanAttribute(){
        $pilihan = array(
            array($this->pilihan_1, $this->skor_1),
            array($this->pilihan_2, $this->skor_2),
            array($this->pilihan_3, $this->skor_3),
            array($this->pilihan_4, $this->skor_4),
            array($this->pilihan_5, $this->skor_5)
        );
        shuffle($pilihan);
        return $pilihan;
    }
    
    public function getJawabanAttribute(){
        if($this->skor_1 === 5){

            return [$this->pilihan_1 => $this->skor_1];
        } elseif ($this->skor_2 === 5) {

            return [$this->pilihan_2 => $this->skor_2];
        } elseif ($this->skor_3 === 5) {

            return [$this->pilihan_3 => $this->skor_3];
        } elseif ($this->skor_4 === 5) {

            return [$this->pilihan_4 => $this->skor_4];
        } else {
            
            return [$this->pilihan_5 => $this->skor_5];
        }
    }

    public function paket(){

        return $this->belongsTo('App\PaketSoal','paket_id');
    }
}

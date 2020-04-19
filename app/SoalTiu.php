<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SoalTiu extends Model
{
    
    protected $hidden = [
        'pilihan_1','pilihan_2','pilihan_3','pilihan_4', 'updated_at', 'created_at'
    ];

    protected $appends = ['pilihan'];

    public function getPilihanAttribute(){
        $pilihan = array(
            $this->attributes['pilihan_1'],$this->attributes['pilihan_2'],
            $this->attributes['pilihan_3'],$this->attributes['pilihan_4'],
            $this->attributes['jawaban']
        );
        return $pilihan;
    }

    public function paket(){

        return $this->belongsTo('App\PaketSoal','paket_id');
    }
}

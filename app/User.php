<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function simulations(){

        return $this->belongsToMany('App\PaketSoal', 'simulations', 'user_id', 'paket_id')
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
                    ->as('simulation')
                    ->withTimestamps();
    }

}

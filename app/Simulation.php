<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Simulation extends Model
{

    protected $hidden = [
        'updated_at', 'created_at'
    ];

    protected $casts = [
        'array_jawaban_twk' => 'array',
        'array_jawaban_tiu' => 'array',
        'array_jawaban_tkp' => 'array',
    ];
}
<?php

namespace App\Models\Halaman;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'halaman_pengelola';

    protected $fillable = [
        'nama', 'foto', 'jabatan'
    ];
}

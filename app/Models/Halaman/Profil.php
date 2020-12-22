<?php

namespace App\Models\Halaman;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
	protected $table = 'halaman_profil';

    protected $fillable = [
        'keterangan'
    ];
}

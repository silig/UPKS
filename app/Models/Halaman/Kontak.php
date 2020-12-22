<?php

namespace App\Models\Halaman;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'halaman_kontak';

    protected $fillable = [
        'email', 'hp'
    ];
}

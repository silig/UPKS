<?php

namespace App\Models\Halaman;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'halaman_berita';

    protected $fillable = [
        'judul', 'konten'
    ];
}

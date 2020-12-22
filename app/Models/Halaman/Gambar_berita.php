<?php

namespace App\Models\Halaman;

use Illuminate\Database\Eloquent\Model;

class Gambar_berita extends Model
{
    protected $table = 'halaman_gambar_berita';

    protected $fillable = [
        'gambar', 'berita_id'
    ];
}

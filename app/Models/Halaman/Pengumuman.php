<?php

namespace App\Models\Halaman;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'halaman_pengumuman';

    protected $fillable = [
        'judul','pengumuman', 'tanggal', 'lampiran'
    ];
}

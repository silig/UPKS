<?php

namespace App\Models\Halaman;

use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    protected $table = 'halaman_panduan';

    protected $fillable = [
        'judul', 'file'
    ];
}

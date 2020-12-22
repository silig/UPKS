<?php

namespace App\Models\Halaman;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';

    protected $fillable = [
        'judul', 'keterangan'
    ];
}

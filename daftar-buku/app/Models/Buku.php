<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //nama tabel
    protected $table = 'buku';

    //kolom yang bisa diisi
    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'sinopsis',
    ];
}

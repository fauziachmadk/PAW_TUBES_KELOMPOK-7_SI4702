<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar_buku', 
        'judul', 
        'penulis', 
        'penerbit', 
        'tahun_terbit', 
        'genre_buku'
    ];
}

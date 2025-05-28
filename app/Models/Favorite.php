<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model 
{
    // Nama tabelnya
    protected $table = 'favorites';

    // Field yang bisa diisi
    protected $fillable = [
        'user_id',
        'buku_id',
        'catatan_opsional',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}

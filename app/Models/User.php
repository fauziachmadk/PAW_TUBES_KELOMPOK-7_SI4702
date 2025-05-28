<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'no_telepon',
        'role',
    ];

        /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];


        /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // User.php
    public function favoritBuku() {
        return $this->belongsToMany(Buku::class, 'favorites')->withPivot('catatan_opsional')->withTimestamps();
    }

    // Buku.php
    public function favoritOleh() {
        return $this->belongsToMany(User::class, 'favorites')->withPivot('catatan_opsional')->withTimestamps();
    }
}

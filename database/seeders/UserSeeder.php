<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //Admin
        User::create([
            'name' => 'Admin Perpus',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        //Anggota
        User::create([
            'name' => 'Anggota Biasa',
            'email' => 'anggota@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'anggota'
        ]);
    }
}

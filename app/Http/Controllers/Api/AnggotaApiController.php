<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class AnggotaApiController extends Controller
{
    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();
        return response()->json($anggota);
    }
}

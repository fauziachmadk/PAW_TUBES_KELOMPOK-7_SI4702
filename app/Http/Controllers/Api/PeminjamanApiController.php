<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;

class PeminjamanApiController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->get();
        return response()->json($peminjaman);
    }
}

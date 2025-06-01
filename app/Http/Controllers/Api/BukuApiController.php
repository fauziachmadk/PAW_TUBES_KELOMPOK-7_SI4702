<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;

class BukuApiController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return response()->json($buku);
    }
}

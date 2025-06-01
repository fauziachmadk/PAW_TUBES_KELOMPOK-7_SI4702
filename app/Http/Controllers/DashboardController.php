<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalAnggota = User::where('role', 'anggota')->count();
        $bukuDipinjam = Peminjaman::where('status', 'pinjam')->count();
        $bukuDikembalikan = Peminjaman::where('status', 'kembali')->count();

        return view('admin.DashboardAdmin', compact(
            'totalBuku',
            'totalAnggota',
            'bukuDipinjam',
            'bukuDikembalikan'
        ));
    }
}

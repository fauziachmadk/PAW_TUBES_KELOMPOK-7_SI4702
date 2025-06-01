{{-- resources/views/user/DashboardAnggota.blade.php --}}
@extends('layouts.user')

@section('content')
    <h1>Dashboard Anggota</h1>
    <p>Selamat datang, {{ Auth::user()->name }} (Anggota)</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">📚 Buku Tersedia</h5>
                    <p class="card-text">Lihat dan Pinjam Buku Dari Perpustakaan.</p>
                    <a href="{{ route('anggota.buku') }}" class="btn btn-primary">Lihat Buku</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">⭐ Favorit Buku</h5>
                    <p class="card-text">Lihat Buku Favorit Kamu</p>
                    <a href="#" class="btn btn-success">Lihat Favorit</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">🕘 History Peminjaman</h5>
                    <p class="card-text">Lihat Status Peminjaman Buku</p>
                    <a href="{{ route('anggota.profil') }}" class="btn btn-info">Lihat History</a>
                </div>
            </div>
        </div>
    </div>
@endsection

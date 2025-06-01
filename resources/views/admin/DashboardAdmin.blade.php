@extends('layouts.admin')

@section('content')
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, {{ Auth::user()->name }} (Admin)</p>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <p class="card-text">{{ $totalBuku }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Anggota</h5>
                    <p class="card-text">{{ $totalAnggota }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Buku Dipinjam</h5>
                    <p class="card-text">{{ $bukuDipinjam }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Buku Dikembalikan</h5>
                    <p class="card-text">{{ $bukuDikembalikan }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

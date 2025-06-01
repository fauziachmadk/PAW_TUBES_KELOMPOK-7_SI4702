@extends('layouts.user')

@section('content')
<div class="container">
    <h3>Daftar Buku Perpustakaan</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($books as $book)
        <div class="col-md-4">
            <div class="card mb-3">
                @if($book->gambar_buku)
                <img src="{{ asset('storage/' . $book->gambar_buku) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <p class="card-text mb-0">Penulis: {{ $book->penulis }}</p>
                    <p class="card-text mb-0">Genre: {{ $book->genre_buku }}</p>
                    <p class="card-text">Tahun Terbit: {{ $book->tahun_terbit }}</p>
                    <form method="POST" action="{{ route('anggota.peminjaman.store') }}">
                        @csrf
                        <input type="hidden" name="buku_id" value="{{ $book->id }}">
                        <button type="submit" class="btn btn-primary btn-sm">Pinjam Buku</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

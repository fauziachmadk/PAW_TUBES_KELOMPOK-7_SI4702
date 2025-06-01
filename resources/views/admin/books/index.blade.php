@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Manajemen Buku</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">Tambah Buku</a>

    <div class="row">
        @foreach ($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if ($book->gambar_buku)
                    <img src="{{ asset('storage/' . $book->gambar_buku) }}" class="card-img-top" alt="Cover Buku {{ $book->judul }}" style="height: 250px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default-cover.jpg') }}" class="card-img-top" alt="Default Cover" style="height: 250px; object-fit: cover;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <p class="card-text">
                        <strong>Penulis:</strong> {{ $book->penulis }}<br>
                        <strong>Penerbit:</strong> {{ $book->penerbit }}<br>
                        <strong>Tahun:</strong> {{ $book->tahun_terbit }}<br>
                        <strong>Genre:</strong> {{ $book->genre_buku }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
    <h1>Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.books.form')
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection

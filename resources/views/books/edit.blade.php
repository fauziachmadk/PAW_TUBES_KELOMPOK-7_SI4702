@extends('layouts.admin')

@section('content')
    <h1>Edit Buku</h1>

    <form action="{{ route('books.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.books.form', ['book' => $buku])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

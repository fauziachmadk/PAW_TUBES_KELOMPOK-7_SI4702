{{-- create.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Anggota</h1>
    <form action="{{ route('anggotas.store') }}" method="POST">
        @csrf
        @include('admin.anggotas.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

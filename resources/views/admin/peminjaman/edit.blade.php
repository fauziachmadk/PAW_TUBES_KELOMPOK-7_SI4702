@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Status Peminjaman</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.peminjaman.form', ['peminjaman' => $peminjaman])

                <button type="submit" class="btn btn-success mt-3">Simpan Perubahan</button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

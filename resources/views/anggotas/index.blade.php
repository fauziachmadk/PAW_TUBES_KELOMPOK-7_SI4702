@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manajemen Anggota</h1>
    <a href="{{ route('anggotas.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $anggota)
            <tr>
                <td>{{ $anggota->name }}</td>
                <td>{{ $anggota->email }}</td>
                <td>{{ $anggota->alamat }}</td>
                <td>{{ $anggota->no_telepon }}</td>
                <td>
                    <a href="{{ route('anggotas.edit', $anggota->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
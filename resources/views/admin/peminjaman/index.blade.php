@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Manajemen Peminjaman</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Anggota</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->user->name ?? 'User tidak ditemukan' }}</td>
                    <td>{{ $peminjaman->buku->judul ?? 'Buku tidak ditemukan' }}</td>
                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                    <td>{{ $peminjaman->tanggal_kembali ?? '-' }}</td>
                    <td>{{ ucfirst ($peminjaman->status) }}</td>
                    <td>
                        <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus peminjaman ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

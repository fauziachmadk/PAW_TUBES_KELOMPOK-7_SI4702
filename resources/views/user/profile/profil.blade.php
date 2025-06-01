@extends('layouts.user')

@section('content')
<div class="container">
    <h4>Riwayat Peminjaman</h4>

    @if($peminjamans->isEmpty())
        <p>Belum ada peminjaman buku.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjamans as $p)
                    <tr>
                        <td>{{ $p->buku->judul ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}</td>
                        <td>
                            {{ $p->tanggal_kembali ? \Carbon\Carbon::parse($p->tanggal_kembali)->format('d M Y') : '-' }}
                        </td>
                        <td>
                            <span class="badge bg-{{ $p->status == 'pinjam' ? 'warning' : 'success' }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

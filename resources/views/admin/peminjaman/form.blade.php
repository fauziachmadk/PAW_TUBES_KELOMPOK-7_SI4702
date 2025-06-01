@php
$peminjaman = $peminjaman ?? null;
@endphp

<div class="mb-3">
    <div class="mb-3">
        <label>Nama Anggota</label>
        <input type="text" value="{{ $peminjaman->user->name ?? '-' }}" class="form-control" disabled>
    </div>

    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text" value="{{ $peminjaman->buku->judul ?? '-' }}" class="form-control" disabled>
    </div>

    <select name="status" id="status" class="form-control" required>
        <option value="pinjam" {{ old('status', $peminjaman->status ?? '') == 'Pinjam' ? 'selected' : '' }}>Pinjam
        </option>
        <option value="kembali" {{ old('status', $peminjaman->status ?? '') == 'Kembali' ? 'selected' : '' }}>Kembali
        </option>
    </select>
</div>
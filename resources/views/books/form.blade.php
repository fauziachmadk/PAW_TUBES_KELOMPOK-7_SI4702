@php $book = $book ?? null; @endphp

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" value="{{ old('judul', $book->judul ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Penulis</label>
    <input type="text" name="penulis" value="{{ old('penulis', $book->penulis ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Penerbit</label>
    <input type="text" name="penerbit" value="{{ old('penerbit', $book->penerbit ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="genre_buku" class="form-label">Genre</label>
    <input type="text" name="genre_buku" class="form-control" value="{{ old('genre_buku', $buku->genre_buku ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Tahun Terbit</label>
    <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $book->tahun_terbit ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Cover Buku</label>
    <input type="file" name="gambar_buku" class="form-control">
    @if(isset($book) && $book->gambar_buku)
        <img src="{{ asset('storage/covers/' . $book->gambar_buku) }}" width="80" class="mt-2">
    @endif
</div>

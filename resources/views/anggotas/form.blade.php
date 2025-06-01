<div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $anggota->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $anggota->email ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control">{{ old('alamat', $anggota->alamat ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="no_telepon" class="form-label">No Telepon</label>
    <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $anggota->no_telepon ?? '') }}">
</div>

@if (!isset($anggota))
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" required>
</div>
<div class="mb-3">
    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
    <input type="password" name="password_confirmation" class="form-control" required>
</div>
@endif
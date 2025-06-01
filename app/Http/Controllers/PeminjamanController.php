<?php

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'buku'])->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => now(),
            'status' => 'pinjam',
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam!');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('admin.peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pinjam,kembali',
            'tanggal_kembali' => 'nullable|date',
        ]);

        $peminjaman->update([
            'status' => $request->status,
            'tanggal_kembali' => $request->status === 'kembali' ? now() : null,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Status peminjaman diperbarui!');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->back()->with('success', 'Data peminjaman dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = User::where('role', 'anggota')->get();
        return view('admin.anggotas.index', compact('anggotas'));
    }

    public function create()
    {
        return view('admin.anggotas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'anggota';

        User::create($validated);

        return redirect()->route('anggotas.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);
        return view('admin.anggotas.edit', compact('anggota'));
    }
    public function update(Request $request, $id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        $anggota->update($validated);

        return redirect()->route('anggotas.index')->with('success', 'Data anggota diperbarui!');
    }

    public function destroy($id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggotas.index')->with('success', 'Anggota dihapus!');
    }

    public function profil()
    {
        $user = Auth::user();

        $peminjamans = Peminjaman::with('buku')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.profile.profil', compact('user', 'peminjamans'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Buku::all();
        return view('admin.books.index', compact('books'));
    }
    
    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|digits:4|integer',
            'genre_buku' => 'required|string|max:100',
            'gambar_buku' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_buku')) {
            $validated['gambar_buku'] = $request->file('gambar_buku')->store('covers', 'public');
        }

        Buku::create($validated);
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

        public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.books.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|digits:4|integer',
            'genre_buku' => 'required|string|max:100',
            'gambar_buku' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_buku')) {
            if ($buku->gambar_buku) {
                Storage::disk('public')->delete($buku->gambar_buku);
            }
            $validated['gambar_buku'] = $request->file('gambar_buku')->store('covers', 'public');
        }

        $buku->update($validated);
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }
    
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        if ($buku->gambar_buku) {
            Storage::disk('public')->delete($buku->gambar_buku);
        }

        $buku->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
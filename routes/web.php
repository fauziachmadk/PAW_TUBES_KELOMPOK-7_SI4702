<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin' ? redirect()->route('dashboard.admin') : redirect()->route('anggota.index');
    }
    return redirect()->route('login');
});


//login dan Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Routes Khusus Admin
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin');

    //Fitur Buku (CRUD)
    Route::resource('books', BookController::class);

    //Fitur Anggota (CRUD)
    Route::resource('anggotas', AnggotaController::class)->except(['show']);

    //Fitur Peminjaman (Admin)
    Route::resource('peminjaman', PeminjamanController::class)->except(['create', 'show']);


});


//Routes Khusus Anggota
Route::middleware('auth')->group(function () {
    Route::get('/anggota', function () {
        if (auth()->user()->role !== 'anggota') {
            return redirect()->route('dashboard.admin');
        }
        return view('user.DashboardAnggota');
    })->name('anggota.index');

    //Fitur Peminjaman (Anggota Pinjam Buku)
    Route::get('/anggota/buku', function () {
        $books = \App\Models\Buku::all();
        return view('user.books.index', compact('books'));
    })->name('anggota.buku');

    //Proses Anggota Pinjam Buku->(PeminjamanController)
    Route::post('/anggota/peminjaman', [PeminjamanController::class, 'storeUser'])->name('anggota.peminjaman.store');
    Route::get('/anggota/profil', [AnggotaController::class, 'profil'])->name('anggota.profil')->middleware('auth');


});

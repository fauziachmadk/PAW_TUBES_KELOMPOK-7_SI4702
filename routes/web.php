<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin' ? redirect()->route('dashboard.admin') : redirect()->route('anggota.index');
    }
    return redirect()->route('login');
});

//Login dan Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Routes Admin
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin');
});
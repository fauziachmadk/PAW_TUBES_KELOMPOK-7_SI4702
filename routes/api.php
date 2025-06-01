<?php

use App\Http\Controllers\Api\BukuApiController;
use App\Http\Controllers\Api\AnggotaApiController;
use App\Http\Controllers\Api\PeminjamanApiController;
use App\Http\Controllers\Api\FavoritApiController;

Route::get('/buku', [BukuApiController::class, 'index']);
Route::get('/anggota', [AnggotaApiController::class, 'index']);
Route::get('/peminjaman', [PeminjamanApiController::class, 'index']);

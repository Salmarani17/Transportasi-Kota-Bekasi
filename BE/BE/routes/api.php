<?php

use Illuminate\Support\Facades\Route;
use App\Models\Transportasi;
use App\Http\Controllers\KoasiController;

// KOASI
Route::get('/koasi', [KoasiController::class, 'apiIndex']);
Route::post('/koasi', [KoasiController::class, 'apiStore']);
Route::delete('/koasi/{id}', [KoasiController::class, 'apiDestroy']);

// 🔥 TRANSPORTASI (WAJIB)

Route::get('/transportasi', function () {
    return Transportasi::with(['stasiun', 'rute'])->get();
});
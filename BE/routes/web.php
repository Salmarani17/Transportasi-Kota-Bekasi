<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\KoasiController;
use App\Http\Controllers\TransportasiController;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// 🔐 Guest
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store']);
});

// ✅ LOGOUT (FIX DI SINI)
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// 🔒 Admin
Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function () {
    Route::resource('transportasi', TransportasiController::class);
    Route::resource('koasi', KoasiController::class);

    Route::resource('users', UserController::class);

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Frontend
Route::get('/rute', [TransportasiController::class, 'rute']);
Route::get('/transportasi/{id}/stasiun', [TransportasiController::class, 'formStasiun'])
    ->name('transportasi.stasiun');
Route::post('transportasi/{id}/stasiun', [TransportasiController::class, 'storeStasiun'])
    ->name('transportasi.stasiun.store');

Route::post('/transportasi/{id}/rute', [TransportasiController::class, 'storeRute']);
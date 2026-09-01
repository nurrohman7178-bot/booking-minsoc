<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\PengaturanController;

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.process');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // // Alias route yang dipakai oleh sidebar Blade
    // Route::get('/customer', [PelangganController::class, 'index'])->name('customer');
    // Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    // Route::get('/schedule', [JadwalController::class, 'index'])->name('schedule');
    // Route::get('/notification', [NotifController::class, 'index'])->name('notification');
    // Route::get('/setting', [PengaturanController::class, 'index'])->name('setting');

    // Resource routes untuk CRUD
    Route::resource('customer', PelangganController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('schedule', JadwalController::class);
    Route::resource('notification', NotifController::class);
    Route::resource('setting', PengaturanController::class);
});
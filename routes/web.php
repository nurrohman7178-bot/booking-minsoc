<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'index'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', function () {

    $user = auth()->user();

    if ($user->role === 'admin') {
        return view('dashboard_admin');
    }

    if ($user->role === 'pelanggan') {
        return view('dashboard_pelanggan');
    }

    abort(403, 'Role tidak dikenali.');
})->middleware('auth')->name('dashboard');

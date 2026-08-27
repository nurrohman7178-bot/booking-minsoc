<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

Route::get('/login', [AuthController::class, 'index'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');
    
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/', function () {
    return view('dashboard_admin');
});

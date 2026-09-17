<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

// Login page
Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

// Process login
Route::post('/login', [LoginController::class, 'login'])
->name('login.process');

// Register page
Route::get('/register', [LoginController::class, 'showRegister'])
    ->name('register');

// Process registration
Route::post('/register', [LoginController::class, 'register'])
    ->name('register.process');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::resource('news', NewsController::class)->except('show');
});
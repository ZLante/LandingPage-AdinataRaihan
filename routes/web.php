<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrganizationController;
use App\Models\News;

Route::get('/', function () {
    return view('welcome', [
        'latestNews' => News::where('status', 'published')->latest()->take(5)->get(),
    ]);
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

Route::get('/visi-misi', [AdminPageController::class, 'visiMisi'])->name('visi-misi');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::middleware('admin')->group(function () {
        Route::resource('news', NewsController::class)->except('show');
        Route::resource('organization', OrganizationController::class)->except(['show', 'index'])->names('organization');
        Route::get('/admin/visi-misi/edit', [AdminPageController::class, 'editVisiMisi'])->name('admin.visi-misi.edit');
        Route::put('/admin/visi-misi', [AdminPageController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');
    });

    Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.index');

    Route::get('/admin/email', [AdminPageController::class, 'email'])->name('admin.email');
    Route::get('/admin/visi-misi', [AdminPageController::class, 'visiMisi'])->name('admin.visi-misi');
    Route::get('/admin/settings', [AdminPageController::class, 'settings'])->name('admin.settings');
    Route::put('/admin/settings', [AdminPageController::class, 'updateSettings'])->name('admin.settings.update');
    Route::get('/admin/help', [AdminPageController::class, 'help'])->name('admin.help');
});
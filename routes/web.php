<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\TopikController;

// Route untuk tampilan halaman depan
Route::get('/', function () {
    return view('index');
});

// Route untuk halaman register
Route::get('/register', function () {
    return view('register');
});

// Route untuk tampilan halaman login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Route untuk proses login
Route::post('/login', [LoginController::class, 'login']);

// Route untuk proses logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk dashboard admin
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Rute untuk Topik
    Route::prefix('admin/topik')->name('admin.topik.')->group(function () {
        Route::get('/', [TopikController::class, 'index'])->name('index');
        Route::get('/create', [TopikController::class, 'create'])->name('create');
        Route::post('/', [TopikController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TopikController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TopikController::class, 'update'])->name('update');
        Route::delete('/{id}', [TopikController::class, 'destroy'])->name('destroy');
    });

    // Rute untuk Materi
    Route::prefix('admin/materi')->name('admin.materi.')->group(function () {
        Route::get('/', [MateriController::class, 'index'])->name('index');
    });
});

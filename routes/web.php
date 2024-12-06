<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\User\TopikController;
use App\Http\Controllers\User\MateriController;
use App\Http\Controllers\User\LowonganController as UserLowonganController;
use App\Http\Controllers\LowonganController; // Menambahkan LowonganController
use App\Http\Controllers\WebinarController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('index');
});

// Route untuk dashboard, hanya bisa diakses oleh pengguna yang terautentikasi dan terverifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes untuk profile, hanya bisa diakses oleh pengguna yang terautentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autentikasi Laravel
require __DIR__.'/auth.php';

// Routes untuk admin, menggunakan middleware AdminMiddleware
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin')->group(function () {
        // Routes untuk topik oleh admin
        Route::get('/topik', [AdminController::class, 'indexTopik'])->name('admin.topik.index');
        Route::get('/topik/create', [AdminController::class, 'createTopik'])->name('admin.topik.create');
        Route::post('/topik', [AdminController::class, 'storeTopik'])->name('admin.topik.store');
        Route::get('/topik/{id}/edit', [AdminController::class, 'editTopik'])->name('admin.topik.edit');
        Route::put('/topik/{id}', [AdminController::class, 'updateTopik'])->name('admin.topik.update');
        Route::delete('/topik/{id}', [AdminController::class, 'deleteTopik'])->name('admin.topik.delete');

        // Routes untuk materi oleh admin
        Route::get('/materi', [AdminController::class, 'indexMateri'])->name('admin.materi.index');
        Route::get('/materi/create', [AdminController::class, 'createMateri'])->name('admin.materi.create');
        Route::post('/materi', [AdminController::class, 'storeMateri'])->name('admin.materi.store');
        Route::get('/materi/{id}/edit', [AdminController::class, 'editMateri'])->name('admin.materi.edit');
        Route::put('/materi/{id}', [AdminController::class, 'updateMateri'])->name('admin.materi.update');
        Route::delete('/materi/{id}', [AdminController::class, 'deleteMateri'])->name('admin.materi.delete');

        // Routes untuk lowongan oleh admin
        Route::resource('lowongan', LowonganController::class)->names('admin.lowongan');

        // Routes untuk webinar
        Route::get('/webinars', [WebinarController::class, 'index'])->name('admin.webinars.index');
        Route::get('/webinars/create', [WebinarController::class, 'create'])->name('admin.webinars.create');
        Route::post('/webinars', [WebinarController::class, 'store'])->name('admin.webinars.store');
        Route::get('/webinars/{id}/edit', [WebinarController::class, 'edit'])->name('admin.webinars.edit');
        Route::put('/webinars/{id}', [WebinarController::class, 'update'])->name('admin.webinars.update');
        Route::delete('webinars/{id}/delete', [WebinarController::class, 'destroy'])->name('webinars.delete');
    });
});

// Routes untuk user, menggunakan middleware UserMiddleware
Route::middleware(['auth', UserMiddleware::class])->group(function () {
    // Routes untuk melihat topik oleh pengguna
    Route::get('/topik', [TopikController::class, 'index'])->name('user.topik.index');
    Route::get('/topik/{id}', [TopikController::class, 'show'])->name('user.topik.show');
    
    // Menambahkan rute untuk menampilkan materi
    Route::get('/materi/{id}', [MateriController::class, 'show'])->name('user.materi.show');
    
    Route::post('/materi/{id}/complete', [MateriController::class, 'complete'])->name('user.materi.complete');
});

// Routes untuk lowongan yang bisa diakses oleh semua pengguna, tanpa login
Route::get('/lowongan', [UserLowonganController::class, 'index'])->name('user.lowongan.index');
Route::get('/lowongan/{id}', [UserLowonganController::class, 'show'])->name('user.lowongan.show');

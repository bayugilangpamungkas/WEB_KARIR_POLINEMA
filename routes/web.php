<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\User\TopikController;
use App\Http\Controllers\User\MateriController;
use App\Http\Controllers\User\LowonganController as UserLowonganController;
use App\Http\Controllers\User\WebinarController as UserWebinarController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\LowonganController;
use App\Http\Controllers\Admin\WebinarController;

// Autentikasi Laravel
require __DIR__ . '/auth.php';

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

// Route untuk menampilkan form register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Routes untuk admin, menggunakan middleware AdminMiddleware
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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

        // Routes untuk manajemen user oleh admin
        Route::get('/list-user', [UserManagementController::class, 'index'])->name('admin.manageuser.index');
        Route::get('/list-user/create', [UserManagementController::class, 'create'])->name('admin.manageuser.create');
        Route::post('/list-user', [UserManagementController::class, 'store'])->name('admin.manageuser.store');
        Route::get('/list-user/{id}/edit', [UserManagementController::class, 'edit'])->name('admin.manageuser.edit');
        Route::put('/list-user/{id}', [UserManagementController::class, 'update'])->name('admin.manageuser.update');
        Route::delete('/list-user/{id}', [UserManagementController::class, 'destroy'])->name('admin.manageuser.destroy');

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

// User routes
Route::get('/webinars', [UserWebinarController::class, 'index'])->name('user.webinars.index');

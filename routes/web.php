<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\AdminMiddleware;

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

// Route untuk role == User
Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/topik', [UserController::class, 'indexTopik'])->name('user.topik.index');
        Route::get('/topik/{id}', [UserController::class, 'showTopik'])->name('user.topik.show');
        Route::get('/materi', [UserController::class, 'indexMateri'])->name('user.materi.index');
        Route::get('/materi/{id}', [UserController::class, 'showMateri'])->name('user.materi.show');
    });
});

// Route untuk role == Admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
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
        Route::get('/create', [MateriController::class, 'create'])->name('create');
        Route::post('/', [MateriController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MateriController::class, 'edit'])->name('edit');
        Route::put('/{id}', [MateriController::class, 'update'])->name('update');
        Route::delete('/{id}', [MateriController::class, 'destroy'])->name('destroy');
    });
});

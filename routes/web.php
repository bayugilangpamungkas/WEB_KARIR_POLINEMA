<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('index');
});


Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Route admin tanpa middleware auth/admin
Route::prefix('admin')->group(function () {
    Route::get('/topik', [AdminController::class, 'indexTopik'])->name('admin.topik.index');
    Route::get('/topik/create', [AdminController::class, 'createTopik'])->name('admin.topik.create');
    Route::post('/topik', [AdminController::class, 'storeTopik'])->name('admin.topik.store');
    Route::get('/topik/{id}/edit', [AdminController::class, 'editTopik'])->name('admin.topik.edit');
    Route::put('/topik/{id}', [AdminController::class, 'updateTopik'])->name('admin.topik.update');
    Route::delete('/topik/{id}', [AdminController::class, 'deleteTopik'])->name('admin.topik.delete');

     // Routes untuk Materi
     Route::get('/materi', [AdminController::class, 'indexMateri'])->name('admin.materi.index');
     Route::get('/materi/create', [AdminController::class, 'createMateri'])->name('admin.materi.create');
     Route::post('/materi', [AdminController::class, 'storeMateri'])->name('admin.materi.store');
     Route::get('/materi/{id}/edit', [AdminController::class, 'editMateri'])->name('admin.materi.edit');
     Route::put('/materi/{id}', [AdminController::class, 'updateMateri'])->name('admin.materi.update');
     Route::delete('/materi/{id}', [AdminController::class, 'deleteMateri'])->name('admin.materi.delete');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;


// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

// Route untuk dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


// Route::get('/admin/topik', [TopikController::class, 'index'])->name('admin.topik.index');



Route::prefix('admin')->name('admin.')->group(function () {
    // Rute untuk Topik
    Route::get('/topik', [TopikController::class, 'index'])->name('topik.index');
    Route::get('/topik/create', [TopikController::class, 'create'])->name('topik.create');
    Route::post('/topik', [TopikController::class, 'store'])->name('topik.store');
    Route::get('/topik/{id}/edit', [TopikController::class, 'edit'])->name('topik.edit');
    Route::put('/topik/{id}', [TopikController::class, 'update'])->name('topik.update');
    Route::delete('/topik/{id}', [TopikController::class, 'destroy'])->name('topik.destroy');
});

Route::get('/admin/materi', [MateriController::class, 'index'])->name('admin.materi.index');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
});




// Route untuk menampilkan form register
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route untuk proses register
// Route::post('/register', [RegisterController::class, 'register']);

// Route untuk dashboard (halaman setelah login)
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

require __DIR__ . '/auth.php';

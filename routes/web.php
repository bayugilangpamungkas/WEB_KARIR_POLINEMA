<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // Buat view admin.dashboard
});

require __DIR__ . '/auth.php';

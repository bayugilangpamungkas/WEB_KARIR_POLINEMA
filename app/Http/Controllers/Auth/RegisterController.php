<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// class RegisterController extends Controller
// {
//     // Menampilkan form register
//     public function showRegistrationForm()
//     {
//         return view('auth.register');
//     }

//     // Fungsi untuk menangani register dan menyimpan ke database
//     public function register(Request $request)
//     {
//         // Validasi input
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:users',
//             'password' => 'required|string|min:8|confirmed',
//         ]);

//         // Simpan data pengguna baru ke dalam database
//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);

//         // Login otomatis setelah register
//         Auth::login($user);

//         // Redirect ke halaman dashboard setelah berhasil register
//         return redirect()->route('dashboard')->with('success', 'Berhasil mendaftar!');
//     }
// }

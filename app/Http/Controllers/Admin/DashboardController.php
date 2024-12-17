<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\User;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // Hitung total lowongan
    //     $totalLowongan = Lowongan::count();

    //     // Hitung total pengguna dengan role 'user'
    //     $totalPengguna = User::where('role', 'user')->count();

    //     // Kirim data ke view
    //     return view('admin.dashboard', compact('totalLowongan', 'totalPengguna'));
    // }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\Webinar;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Rangkuman jumlah data tabel
        $totalLowongan = Lowongan::count();
        $totalPengguna = User::where('role', 'user')->count();
        $totalWebinar = Webinar::count();

        return view('admin.dashboard', compact('totalLowongan', 'totalPengguna', 'totalWebinar'));
    }
}

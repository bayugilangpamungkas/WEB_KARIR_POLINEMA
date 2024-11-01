<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi; // Pastikan Anda mengimpor model yang sesuai
use App\Models\Topik;  // Jika Anda menggunakan model Topik
use App\Models\Message; // Jika Anda menggunakan model Message

class UserController extends Controller
{
    //
    public function dashboard()
    {
        // Menghitung jumlah materi, topik, dan pesan
        $materiCount = Materi::count();
        $topikCount = Topik::count();

        // Mengambil 5 materi terbaru
        $materis = Materi::latest()->take(5)->get();

        // Mengembalikan view dengan data
        return view('user.dashboard', compact('materiCount', 'topikCount', 'materis'));
    }
}

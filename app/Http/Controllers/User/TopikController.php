<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    // Menampilkan daftar topik untuk user
    public function index()
    {
        $topiks = Topik::all(); // Mengambil semua topik dari database
        return view('user.topik.index', compact('topiks'));
    }

    // Menampilkan detail topik dan daftar materi yang terkait
    public function show($id)
    {
        $topik = Topik::findOrFail($id); // Mencari topik berdasarkan ID
        $materis = $topik->materis; // Mendapatkan materi terkait topik ini
        return view('user.materi.index', compact('topik', 'materis'));
    }
}

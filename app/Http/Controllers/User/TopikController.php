<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Topik;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $topik = Topik::with('materis')->findOrFail($id); // Ambil topik beserta materi
        $materis = $topik->materis; // Mendapatkan materi terkait topik ini
        $userId = Auth::id(); // Ambil ID user yang sedang login
    
        // Total materi dalam topik
        $totalMateri = $materis->count();
    
        // Hitung materi yang selesai berdasarkan tabel progress
        $completedMateri = DB::table('progress')
            ->where('user_id', $userId)
            ->whereIn('materi_id', $materis->pluck('id')) // Materi-materi dalam topik
            ->where('is_completed', 1)
            ->count();
    
        // Hitung progres dalam persentase
        $progress = $totalMateri > 0 ? round(($completedMateri / $totalMateri) * 100, 2) : 0;
    
        // Kirim data ke view
        return view('user.materi.index', compact('topik', 'materis', 'progress'));
    }
    }

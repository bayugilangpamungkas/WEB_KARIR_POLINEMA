<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Pastikan DB di-import
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    // Menampilkan detail materi
    public function show($id)
    {
        $materi = Materi::findOrFail($id); // Mencari materi berdasarkan ID
        return view('user.materi.show', compact('materi'));
    }

    public function complete($id)
    {
        $userId = Auth::id(); // Mengambil ID user yang sedang login
        
        // Update atau Insert progress materi untuk user
        DB::table('progress')->updateOrInsert(
            ['user_id' => $userId, 'materi_id' => $id],
            ['is_completed' => 1, 'updated_at' => now()] // Tandai materi selesai
        );
    
        // Hitung progres topik terkait
        $materi = Materi::findOrFail($id);
        $topik = $materi->topik; // Ambil topik yang berhubungan dengan materi
        $totalMateri = $topik->materis->count();
        $completedMateri = DB::table('progress')
            ->where('user_id', $userId)
            ->whereIn('materi_id', $topik->materis->pluck('id'))
            ->where('is_completed', 1)
            ->count();
    
        // Hitung progres dalam persentase
        $progress = $totalMateri > 0 ? round(($completedMateri / $totalMateri) * 100, 2) : 0;
    
        // Redirect kembali dengan pesan sukses dan update progres
        return redirect()->route('user.topik.show', $topik->id)
            ->with('success', 'Materi berhasil ditandai selesai.')
            ->with('progress', $progress); // Mengirim progres sebagai data session
    }
    }

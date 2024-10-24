<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use App\Models\Materi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexTopik()
    {
        $topiks = Topik::all(); // Ambil semua topik
        return view('user.topik.index', compact('topiks'));
    }

    public function showTopik($id)
    {
        $topik = Topik::with('materis')->findOrFail($id); // Ambil topik berdasarkan ID dan materi terkait
        return view('user.topik.show', compact('topik'));
    }

    public function indexMateri()
    {
        $materis = Materi::all(); // Ambil semua materi
        return view('user.materi.index', compact('materis'));
    }

    public function showMateri($id)
    {
        $materi = Materi::findOrFail($id); // Ambil materi berdasarkan ID
        return view('user.materi.show', compact('materi'));
    }

    // public function profile()
    // {
    //     $user = Auth::user(); // Mendapatkan data user yang sedang login
    //     return view('user.profile', compact('user'));
    // }

    // public function profile()
    // {
    //     $user = Auth::user(); // Pastikan Auth::user() tidak null
    //     if (!$user) {
    //         return redirect()->route('login'); // Redirect ke halaman login jika user tidak ada
    //     }

    //     return view('user.profile', compact('user'));
    // }
}

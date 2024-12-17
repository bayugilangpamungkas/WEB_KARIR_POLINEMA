<?php

namespace App\Http\Controllers\User;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LowonganController extends Controller
{
    /**
     * Menampilkan daftar lowongan untuk pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $lowonganList = Lowongan::all(); // Mengambil semua lowongan
        return view('user.lowongan.index', compact('lowonganList'));
    }

    /**
     * Menampilkan detail lowongan untuk pengguna.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $lowongan = Lowongan::findOrFail($id); // Mencari lowongan berdasarkan ID
        return view('user.lowongan.show', compact('lowongan'));
    }
}

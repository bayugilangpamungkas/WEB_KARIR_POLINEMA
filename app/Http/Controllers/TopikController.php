<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topik; // Pastikan model Topik digunakan

class TopikController extends Controller
{
    // Fungsi untuk menampilkan semua topik
    public function index()
    {
        $topiks = Topik::all(); // Mengambil semua data topik
        return view('admin.topik.index', compact('topiks'));
    }

    // Fungsi untuk menampilkan form tambah topik
    public function create()
    {
        return view('admin.topik.create');
    }

    // Fungsi untuk menyimpan topik baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_topik' => 'required|string|max:255',
            'deskripsi_topik' => 'nullable|string',
        ]);

        Topik::create($request->only('judul_topik', 'deskripsi_topik')); // Menggunakan model Topik untuk menyimpan data

        return redirect()->route('admin.topik.index')->with('success', 'Topik berhasil ditambahkan.');
    }

    // Fungsi untuk menampilkan form edit topik
    public function edit($id)
    {
        $topik = Topik::findOrFail($id); // Menggunakan model Topik untuk menemukan topik berdasarkan ID
        return view('admin.topik.edit', compact('topik'));
    }

    // Fungsi untuk memperbarui data topik
    public function update(Request $request, $id)
    {
        $topik = Topik::findOrFail($id); // Menggunakan model Topik untuk menemukan topik

        $request->validate([
            'judul_topik' => 'required|string|max:255',
            'deskripsi_topik' => 'nullable|string',
        ]);

        $topik->update($request->only('judul_topik', 'deskripsi_topik')); // Memperbarui data topik

        return redirect()->route('admin.topik.index')->with('success', 'Topik berhasil diupdate.');
    }

    // Fungsi untuk menghapus topik dari database
    public function destroy($id)
    {
        $topik = Topik::findOrFail($id); // Menggunakan model Topik untuk menemukan topik
        $topik->delete(); // Menghapus topik

        return redirect()->route('admin.topik.index')->with('success', 'Topik berhasil dihapus.');
    }
}

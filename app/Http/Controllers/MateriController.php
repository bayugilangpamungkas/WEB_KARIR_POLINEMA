<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    // Menampilkan daftar materi
    public function index()
    {
        // Ambil semua materi dari database
        $materi = Materi::all();

        // Tampilkan ke view
        return view('admin.materi.index', compact('materi'));
    }

    // Menampilkan form untuk membuat materi baru
    public function create()
    {
        return view('admin.materi.create');
    }

    // Menyimpan materi baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Simpan materi baru ke database
        Materi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman daftar materi dengan pesan sukses
        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit materi
    public function edit($id)
    {
        // Cari materi berdasarkan id
        $materi = Materi::findOrFail($id);

        // Tampilkan form edit dengan data materi
        return view('admin.materi.edit', compact('materi'));
    }

    // Memperbarui materi yang ada di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Cari materi berdasarkan id
        $materi = Materi::findOrFail($id);

        // Update data materi
        $materi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman daftar materi dengan pesan sukses
        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil diperbarui!');
    }

    // Menghapus materi dari database
    public function destroy($id)
    {
        // Cari materi berdasarkan id
        $materi = Materi::findOrFail($id);

        // Hapus materi
        $materi->delete();

        // Redirect ke halaman daftar materi dengan pesan sukses
        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil dihapus!');
    }
}

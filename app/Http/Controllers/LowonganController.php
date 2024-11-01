<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan; // Menggunakan model Lowongan

class LowonganController extends Controller
{
    // Menampilkan daftar lowongan
    public function index()
    {
        $lowongans = Lowongan::all(); // Ganti LowonganController dengan Lowongan
        return view('admin.lowongan.lowongan', compact('lowongans')); // Pastikan view path sesuai
    }

    // Menampilkan formulir untuk menambah lowongan
    public function create()
    {
        return view('admin.lowongan.create'); // View untuk form tambah lowongan
    }

    // Menyimpan lowongan baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
        ]);

        Lowongan::create($request->all()); // Menggunakan model Lowongan untuk menyimpan data
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    // Menampilkan formulir untuk mengedit lowongan
    public function edit($id)
    {
        $lowongan = Lowongan::findOrFail($id); // Mengambil lowongan berdasarkan ID
        return view('admin.lowongan.edit', compact('lowongan')); // View untuk form edit lowongan
    }

    // Mengupdate lowongan
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
        ]);

        $lowongan = Lowongan::findOrFail($id); // Mengambil lowongan berdasarkan ID
        $lowongan->update($request->all()); // Mengupdate data lowongan
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diperbarui!');
    }

    // Menghapus lowongan
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id); // Mengambil lowongan berdasarkan ID
        $lowongan->delete(); // Menghapus lowongan
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus!');
    }
}

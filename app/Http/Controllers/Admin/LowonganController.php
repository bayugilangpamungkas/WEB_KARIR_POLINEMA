<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    // Menampilkan daftar lowongan
    public function index()
    {
        $lowonganList = Lowongan::all();
        return view('admin.lowongan.index', compact('lowonganList'));
    }

    // Menampilkan formulir pembuatan lowongan
    public function create()
    {
        return view('admin.lowongan.create');
    }

    // Menyimpan lowongan baru
    public function store(Request $request)
    {
        $request->validate([
            'fotoLowongan' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'googleMapsLink' => 'nullable|url',
            'posisi' => 'required|string|max:255',
            'namaPerusahaan' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
        ]);

        $lowongan = new Lowongan();
        if ($request->hasFile('fotoLowongan')) {
            $path = $request->file('fotoLowongan')->store('lowongan_photos', 'public');
            $lowongan->foto_url = Storage::url($path);
        }

        $lowongan->judul = $request->judul;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->google_maps_link = $request->googleMapsLink;
        $lowongan->posisi = $request->posisi;
        $lowongan->nama_perusahaan = $request->namaPerusahaan;
        $lowongan->kontak = $request->kontak;
        $lowongan->tanggal_mulai = $request->tanggalMulai;
        $lowongan->tanggal_selesai = $request->tanggalSelesai;
        $lowongan->save();

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dibuat.');
    }

    // Menampilkan formulir edit lowongan
    public function edit($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('admin.lowongan.edit', compact('lowongan'));
    }

    // Memperbarui data lowongan
    public function update(Request $request, $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        $request->validate([
            'fotoLowongan' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'googleMapsLink' => 'nullable|url',
            'posisi' => 'required|string|max:255',
            'namaPerusahaan' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:255',
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date',
        ]);

        // Update foto jika ada file baru
        if ($request->hasFile('fotoLowongan')) {
            if ($lowongan->foto_url) {
                Storage::delete('public/' . $lowongan->foto_url);
            }
            $path = $request->file('fotoLowongan')->store('lowongan_photos', 'public');
            $lowongan->foto_url = Storage::url($path);
        }

        $lowongan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'google_maps_link' => $request->googleMapsLink,
            'posisi' => $request->posisi,
            'nama_perusahaan' => $request->namaPerusahaan,
            'kontak' => $request->kontak,
            'tanggal_mulai' => $request->tanggalMulai,
            'tanggal_selesai' => $request->tanggalSelesai,
        ]);

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    // Menghapus lowongan dari database
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);

        // Hapus foto jika ada
        if ($lowongan->foto_url) {
            Storage::delete('public/' . $lowongan->foto_url);
        }

        $lowongan->delete();
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}

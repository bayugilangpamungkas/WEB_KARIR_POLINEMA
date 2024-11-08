<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lowongan; // Menggunakan model Lowongan

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data lowongan dan mengurutkannya berdasarkan yang terbaru
        $lowongans = Lowongan::latest()->get(); // Menampilkan data lowongan terbaru
        return view('admin.lowongan.index', compact('lowongans')); // Mengirim data lowongan ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah lowongan
        return view('admin.lowongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input dari user
        $request->validate([
            'title' => 'required|max:255',
            'company' => 'required|max:255',  // Validasi perusahaan
            'deskripsi' => 'required',        // Validasi deskripsi
            'tanggal_berakhir' => 'required|date',
        ]);

        // Menyimpan data lowongan
        Lowongan::create([
            'title' => $request->title,
            'company' => $request->company,
            'description' => $request->deskripsi,  // Pastikan menggunakan 'description' sesuai kolom di database
            'tanggal_berakhir' => $request->tanggal_berakhir,
        ]);

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mengambil data lowongan berdasarkan ID atau mengembalikan error 404 jika tidak ditemukan
        $lowongan = Lowongan::findOrFail($id);
        return view('admin.lowongan.show', compact('lowongan')); // Menampilkan detail lowongan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil data lowongan berdasarkan ID atau mengembalikan error 404 jika tidak ditemukan
        $lowongan = Lowongan::findOrFail($id);
        return view('admin.lowongan.edit', compact('lowongan')); // Menampilkan form untuk mengedit lowongan
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input dari user
        $request->validate([
            'title' => 'required|string|max:255',  // Pastikan 'title' tidak kosong dan tidak lebih dari 255 karakter
            'deskripsi' => 'required|string',      // Deskripsi wajib ada
            'tanggal_berakhir' => 'required|date', // Pastikan tanggal berakhir valid
        ]);

        // Mengambil data lowongan berdasarkan ID
        $lowongan = Lowongan::findOrFail($id);

        // Update data lowongan di database
        $lowongan->update([
            'title' => $request->title,
            'company' => $request->company,  // Pastikan input ini ada di form
            'description' => $request->deskripsi,  // Update deskripsi
            'tanggal_berakhir' => $request->tanggal_berakhir,  // Update tanggal berakhir
        ]);

        // Redirect ke halaman daftar lowongan dengan pesan sukses
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mengambil data lowongan berdasarkan ID
        $lowongan = Lowongan::findOrFail($id);

        // Hapus data lowongan dari database
        $lowongan->delete();

        // Redirect ke halaman daftar lowongan dengan pesan sukses
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}

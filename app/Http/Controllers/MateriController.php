<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Topik;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with('topik')->get(); // Mengambil semua materi dengan relasi topik
        return view('admin.materi.index', compact('materis'));
    }

    public function create()
    {
        $topiks = Topik::all(); // Ambil semua topik untuk dropdown
        return view('admin.materi.create', compact('topiks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topik_id' => 'required|exists:topiks,id',
            'nama_materi' => 'required|string|max:255',
            'deskripsi_materi' => 'nullable|string',
            'judul_konten' => 'nullable|string|max:255',
            'url_konten' => 'nullable|url',
        ]);

        // Membuat slug otomatis dari nama materi menggunakan Str
        $slug = Str::slug($request->nama_materi);

        Materi::create(array_merge(
            $request->only('topik_id', 'nama_materi', 'deskripsi_materi', 'judul_konten', 'url_konten'),
            ['slug' => $slug] // Menyimpan slug dalam database
        ));

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        $topiks = Topik::all(); // Ambil semua topik untuk dropdown
        return view('admin.materi.edit', compact('materi', 'topiks'));
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $request->validate([
            'topik_id' => 'required|exists:topiks,id',
            'nama_materi' => 'required|string|max:255',
            'deskripsi_materi' => 'nullable|string',
            'judul_konten' => 'nullable|string|max:255',
            'url_konten' => 'nullable|url',
        ]);

        // Perbarui slug jika nama materi berubah
        $slug = Str::slug($request->nama_materi);

        $materi->update(array_merge(
            $request->only('topik_id', 'nama_materi', 'deskripsi_materi', 'judul_konten', 'url_konten'),
            ['slug' => $slug]
        ));

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}

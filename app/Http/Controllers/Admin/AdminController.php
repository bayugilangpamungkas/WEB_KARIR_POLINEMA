<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Topik;
use App\Models\Materi;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard'); // Mengembalikan tampilan dashboard
    }

    // CRUD untuk Topik
    public function indexTopik()
    {
        $topiks = Topik::all();
        return view('admin.topik.index', compact('topiks'));
    }

    public function createTopik()
    {
        return view('admin.topik.create');
    }

    public function storeTopik(Request $request)
    {
        $request->validate([
            'judul_topik' => 'required|string|max:255',
            'deskripsi_topik' => 'nullable|string',
        ]);

        Topik::create($request->only('judul_topik', 'deskripsi_topik'));

        return redirect()->route('admin.topik.index')->with('success', 'Topik berhasil ditambahkan.');
    }

    public function editTopik($id)
    {
        $topik = Topik::findOrFail($id);
        return view('admin.topik.edit', compact('topik'));
    }

    public function updateTopik(Request $request, $id)
    {
        $topik = Topik::findOrFail($id);

        $request->validate([
            'judul_topik' => 'required|string|max:255',
            'deskripsi_topik' => 'nullable|string',
        ]);

        $topik->update($request->only('judul_topik', 'deskripsi_topik'));

        return redirect()->route('admin.topik.index')->with('success', 'Topik berhasil diupdate.');
    }

    public function deleteTopik($id)
    {
        $topik = Topik::findOrFail($id);
        $topik->delete();

        return redirect()->route('admin.topik.index')->with('success', 'Topik berhasil dihapus.');
    }

    // CRUD untuk Materi
    public function indexMateri()
    {
        $materis = Materi::with('topik')->get(); // Mengambil semua materi dengan relasi topik
        return view('admin.materi.index', compact('materis'));
    }

    public function createMateri()
    {
        $topiks = Topik::all(); // Ambil semua topik untuk dropdown
        return view('admin.materi.create', compact('topiks'));
    }

    public function storeMateri(Request $request)
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

    public function editMateri($id)
    {
        $materi = Materi::findOrFail($id);
        $topiks = Topik::all(); // Ambil semua topik untuk dropdown
        return view('admin.materi.edit', compact('materi', 'topiks'));
    }

    public function updateMateri(Request $request, $id)
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

    public function deleteMateri($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}

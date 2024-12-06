<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Webinar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class WebinarController extends Controller
{

    public function index()
    {
        $webinars = Webinar::latest()->get();
        return view('admin.webinars.index', compact('webinars'));
    }
    
    //FORMM CRUD
    public function create()
    {
        return view('admin.webinars.create');
    }


    // Menyimpan webinar baru
    public function store(Request $request)
    {
        $request->validate([
            'judul_web' => 'required',
            'tanggal_web' => 'required|date',
            'narasumber' => 'required',
            'poster_web' => 'required|image',
            'link_web' => 'required|url',
        ]);

        $posterPath = $request->file('poster_web')->store('posters', 'public');

        Webinar::create([
            'judul_web' => $request->judul_web,
            'tanggal_web' => $request->tanggal_web,
            'narasumber' => $request->narasumber,
            'poster_web' => $posterPath,
            'link_web' => $request->link_web,
        ]);

        return redirect()->route('admin.webinars.index')->with('success', 'Webinar berhasil ditambahkan');
    }

    // Menampilkan form edit webinar
    public function edit($id)
{
    $webinar = Webinar::findOrFail($id);  // Pastikan mendapatkan data webinar dengan benar
    return view('admin.webinars.edit', compact('webinar'));
}


    // Mengupdate webinar
    public function update($id, Request $request, Webinar $webinar)
{
    $webinar = Webinar::findOrFail($id);  // Cari webinar berdasarkan ID

    $request->validate([
        'judul_web' => 'required',
        'tanggal_web' => 'required|date',
        'narasumber' => 'required',
        'poster_web' => 'nullable|image',
        'link_web' => 'required|url',
    ]);

    // Lakukan pembaruan pada webinar
    $webinar->update([
        'judul_web' => $request->judul_web,
        'tanggal_web' => $request->tanggal_web,
        'narasumber' => $request->narasumber,
        'poster_web' => $request->poster_web ? $request->poster_web->store('posters') : $webinar->poster_web,
        'link_web' => $request->link_web,
    ]);

    return redirect()->route('admin.webinars.index')->with('success', 'Webinar updated successfully!');
}


     // Menghapus webinar
     public function destroy($id)
     {
         $webinar = Webinar::find($id);
     
         if (!$webinar) {
             return redirect()->route('admin.webinars.index')->with('error', 'Webinar tidak ditemukan.');
         }
     
         $webinar->delete();
     
         return redirect()->route('admin.webinars.index')->with('success', 'Webinar berhasil dihapus.');
}
 
}
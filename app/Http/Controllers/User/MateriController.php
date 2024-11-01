<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    // Menampilkan detail materi
    public function show($id)
    {
        $materi = Materi::findOrFail($id); // Mencari materi berdasarkan ID
        return view('user.materi.show', compact('materi'));
    }
}

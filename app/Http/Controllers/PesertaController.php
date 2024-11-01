<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta; // Pastikan Model Peserta ada dan sesuai dengan tabel di database

class PesertaController extends Controller
{
    //
    public function index()
    {
        // Ambil data peserta dari database
        $pesertas = Peserta::all();
        
        // Kirim data ke view
        return view('admin.peserta.index', compact('pesertas'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'judul',             // Judul lowongan
        'deskripsi',         // Deskripsi lowongan
        'google_maps_link',  // Link Google Maps untuk lokasi
        'posisi',            // Posisi yang ditawarkan
        'nama_perusahaan',   // Nama perusahaan yang menawarkan
        'kontak',            // Kontak yang bisa dihubungi
        'tanggal_mulai',     // Tanggal mulai berlaku lowongan
        'tanggal_selesai',   // Tanggal berakhirnya lowongan
        'foto_url',          // URL untuk foto atau logo lowongan
    ];

    // Tentukan atribut tanggal (carbon instances)
    protected $dates = [
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan (opsional jika nama tabel tidak jamak)
    protected $table = 'peserta';

    // Kolom yang bisa diisi menggunakan mass assignment
    protected $fillable = [
        'nama', 
        'email',
        'nim', 
        'status',
        'tanggal_daftar'
    ];

    // Jika ada kolom tanggal yang menggunakan format yang tidak biasa
    protected $dates = ['tanggal_daftar'];

    /**
     * Scope untuk memfilter peserta yang aktif.
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    /**
     * Scope untuk memfilter peserta yang non-aktif.
     */
    public function scopeNonAktif($query)
    {
        return $query->where('status', 'Non-Aktif');
    }

    /**
     * Fungsi untuk mendapatkan status peserta dalam format label yang mudah dipahami.
     * Misalnya, mengganti status dengan label berwarna untuk tampilan.
     */
    public function getStatusLabelAttribute()
    {
        if ($this->status == 'Aktif') {
            return '<span class="text-green-500">Aktif</span>';
        }
        
        return '<span class="text-red-500">Non-Aktif</span>';
    }

    /**
     * Contoh relasi jika peserta berhubungan dengan tabel lain.
     * Misalnya, jika peserta memiliki banyak 'Kursus'.
     */
    public function kursus()
    {
        return $this->hasMany(Kursus::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    use HasFactory;
    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'admins';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'nim',
        'password',
        'foto_profile',
        'type',
    ];

    // Menyembunyikan kolom sensitif agar tidak terekspos
    protected $hidden = [
        'password',
    ];

    // Mutator untuk meng-hash password sebelum disimpan ke database
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = Hash::make($password);
        }
    }

    // Mutator untuk mengatur foto profil dengan path lengkap
    public function setFotoProfileAttribute($fotoProfile)
    {
        if (is_string($fotoProfile)) {
            $this->attributes['foto_profile'] = $fotoProfile;
        }
    }

    // Mendapatkan path foto profil dengan disk 'public' untuk akses
    public function getFotoProfileAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('storage/foto_profile/default.png');
    }

    // Menambahkan accessor untuk mendapatkan tipe admin dengan format yang lebih mudah dibaca
    public function getTypeAttribute($value)
    {
        return ucfirst($value); // Mengubah tipe menjadi kapitalisasi pertama
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'admin_users';

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto_profile',
        'type',
    ];

    // Meng-hash password secara otomatis saat disimpan
    public function setPasswordAttribute($password)
    {
        // Hash password jika ada nilai baru
        $this->attributes['password'] = Hash::make($password);
    }

    // Jika Anda ingin menggunakan hashing password secara otomatis saat model dibuat
    protected static function boot()
    {
        parent::boot();

        // Hash password saat model dibuat
        static::creating(function ($adminUser) {
            if ($adminUser->password) {
                $adminUser->password = Hash::make($adminUser->password);
            }
        });
    }
}

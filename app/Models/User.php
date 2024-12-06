<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'nim',
        'password',
        'role', // Pastikan 'role' ada di sini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 10 mendukung 'hashed' sebagai tipe casting
    ];

    public function progresses()
{
    return $this->hasMany(Progress::class);
}
// User.php
public function materis()
{
    return $this->belongsToMany(Materi::class, 'progress')->withPivot('is_completed');
}

}

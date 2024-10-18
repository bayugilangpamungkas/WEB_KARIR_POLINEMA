<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;

    protected $fillable = ['judul_topik', 'deskripsi_topik'];

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }
}

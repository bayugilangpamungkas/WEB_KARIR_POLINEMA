<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = ['topik_id', 'nama_materi', 'deskripsi_materi', 'judul_konten', 'url_konten'];

    public function topik()
    {
        return $this->belongsTo(Topik::class);
    }
}

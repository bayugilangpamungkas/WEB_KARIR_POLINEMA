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

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }

    /**
     * Cek apakah materi ini sudah selesai untuk pengguna tertentu.
     *
     * @param User $user
     * @return bool
     */
    public function isCompleted(User $user)
    {
        return $this->progresses()
            ->where('user_id', $user->id)
            ->where('is_completed', true)
            ->exists();
    }
}

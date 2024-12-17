<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = ['judul_web', 'tanggal_web', 'narasumber', 'poster_web', 'link_web'];
}

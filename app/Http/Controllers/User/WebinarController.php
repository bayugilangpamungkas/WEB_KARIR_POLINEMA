<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; // Tambahkan ini untuk mengimpor Controller
use App\Models\Webinar;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Webinar::all(); // Ambil semua data webinar
        return view('user.webinars.index', compact('webinars'));
    }
}

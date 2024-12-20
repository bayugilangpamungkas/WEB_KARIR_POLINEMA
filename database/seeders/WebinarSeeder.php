<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Webinar; // Import model Webinar
use Illuminate\Support\Str;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data seed
        $webinars = [
            [
                'judul_web' => 'Webinar Laravel untuk Pemula',
                'tanggal_web' => now()->addDays(10),
                'narasumber' => 'John Doe',
                'poster_web' => 'posters/default-poster.jpg',
                'link_web' => 'https://example.com/webinar-laravel',
            ],
            [
                'judul_web' => 'Tren Teknologi 2024',
                'tanggal_web' => now()->addDays(20),
                'narasumber' => 'Jane Smith',
                'poster_web' => 'posters/default-poster2.jpg',
                'link_web' => 'https://example.com/tren-teknologi',
            ],
            [
                'judul_web' => 'Memahami DevOps',
                'tanggal_web' => now()->addDays(30),
                'narasumber' => 'Alice Johnson',
                'poster_web' => 'posters/default-poster3.jpg',
                'link_web' => 'https://example.com/devops-webinar',
            ],
        ];

        foreach ($webinars as $webinar) {
            Webinar::create($webinar);
        }
    }
}

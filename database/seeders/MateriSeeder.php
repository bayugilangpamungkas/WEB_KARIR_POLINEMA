<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materis')->insert([
            [
                'topik_id' => 1, // Pastikan ini sesuai dengan id dari tabel topiks
                'nama_materi' => 'Materi Pertama',
                'deskripsi_materi' => 'Deskripsi materi pertama.',
                'judul_konten' => 'Konten Pertama',
                'url_konten' => 'https://example.com/konten-pertama',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'topik_id' => 2, // Sesuaikan dengan id dari tabel topiks
                'nama_materi' => 'Materi Kedua',
                'deskripsi_materi' => 'Deskripsi materi kedua.',
                'judul_konten' => 'Konten Kedua',
                'url_konten' => 'https://example.com/konten-kedua',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'topik_id' => 3, // Sesuaikan dengan id dari tabel topiks
                'nama_materi' => 'Materi Ketiga',
                'deskripsi_materi' => 'Deskripsi materi ketiga.',
                'judul_konten' => 'Konten Ketiga',
                'url_konten' => 'https://example.com/konten-ketiga',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

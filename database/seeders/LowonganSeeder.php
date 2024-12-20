<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lowongans')->insert([
            [
                'judul' => 'Lowongan Software Engineer',
                'deskripsi' => 'Kami mencari Software Engineer berpengalaman dengan keahlian dalam pengembangan aplikasi web.',
                'google_maps_link' => 'https://maps.google.com/?q=-6.200000,106.816666',
                'posisi' => 'Software Engineer',
                'nama_perusahaan' => 'PT Teknologi Nusantara',
                'kontak' => 'hr@teknologi-nusantara.com',
                'tanggal_mulai' => Carbon::now()->addDays(10),
                'tanggal_selesai' => Carbon::now()->addDays(30),
                'foto_url' => 'https://via.placeholder.com/150',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Lowongan Digital Marketing',
                'deskripsi' => 'Mencari seorang Digital Marketing Specialist yang mampu meningkatkan branding perusahaan.',
                'google_maps_link' => 'https://maps.google.com/?q=-6.175110,106.865036',
                'posisi' => 'Digital Marketing Specialist',
                'nama_perusahaan' => 'PT Media Kreatif',
                'kontak' => 'hr@mediakreatif.com',
                'tanggal_mulai' => Carbon::now()->addDays(5),
                'tanggal_selesai' => Carbon::now()->addDays(25),
                'foto_url' => 'https://via.placeholder.com/150',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Lowongan UI/UX Designer',
                'deskripsi' => 'Kami membutuhkan seorang UI/UX Designer dengan pengalaman minimal 2 tahun.',
                'google_maps_link' => 'https://maps.google.com/?q=-6.917464,107.619123',
                'posisi' => 'UI/UX Designer',
                'nama_perusahaan' => 'PT Kreatif Visual',
                'kontak' => 'hr@kreatifvisual.com',
                'tanggal_mulai' => Carbon::now()->addDays(7),
                'tanggal_selesai' => Carbon::now()->addDays(28),
                'foto_url' => 'https://via.placeholder.com/150',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

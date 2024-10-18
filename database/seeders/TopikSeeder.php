<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TopikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topiks')->insert([
            [
                'judul_topik' => 'Topik Pertama',
                'deskripsi_topik' => 'Ini adalah deskripsi untuk topik pertama.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul_topik' => 'Topik Kedua',
                'deskripsi_topik' => 'Ini adalah deskripsi untuk topik kedua.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul_topik' => 'Topik Ketiga',
                'deskripsi_topik' => 'Ini adalah deskripsi untuk topik ketiga.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

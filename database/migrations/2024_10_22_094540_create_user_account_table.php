<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;

class UserAccountSeeder extends Seeder
{
    public function run()
    {
        UserAccount::create([
            'nama_lengkap' => 'Admin User',
            'email' => 'admin@example.com',
            'nim' => '12345678',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        UserAccount::create([
            'nama_lengkap' => 'Regular User',
            'email' => 'user@example.com',
            'nim' => '87654321',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}

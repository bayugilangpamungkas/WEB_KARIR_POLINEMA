<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'nim' => '123456789',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'nim' => '987654321',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}

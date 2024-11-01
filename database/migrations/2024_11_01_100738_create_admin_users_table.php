<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Admin
            $table->string('email')->unique(); // Email Admin
            $table->string('password'); // Password Admin
            $table->string('foto_profile')->nullable(); // Foto Profil
            $table->enum('type', ['admin', 'superadmin']); // Tipe User
            $table->rememberToken(); // Token untuk "Remember Me" saat login
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
};

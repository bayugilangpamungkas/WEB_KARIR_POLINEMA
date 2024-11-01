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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id(); // Kolom primary key 'id'
            $table->string('nama'); // Kolom nama
            $table->string('email')->unique(); // Kolom email yang harus unik
            $table->string('nim')->unique(); // Kolom NIM (Nomor Induk Mahasiswa) yang juga unik
            $table->enum('status', ['Aktif', 'Non-Aktif'])->default('Aktif'); // Kolom status dengan nilai default 'Aktif'
            $table->date('tanggal_daftar'); // Kolom tanggal untuk tanggal pendaftaran
            $table->timestamps(); // Kolom otomatis created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta'); // Menghapus tabel jika migrasi dibatalkan
    }
};

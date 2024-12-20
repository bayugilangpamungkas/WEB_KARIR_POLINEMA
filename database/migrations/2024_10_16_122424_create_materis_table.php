<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topik_id')->constrained('topiks')->onDelete('cascade');
            $table->string('nama_materi');
            $table->text('deskripsi_materi')->nullable();
            $table->string('judul_konten')->nullable();
            $table->string('url_konten')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};

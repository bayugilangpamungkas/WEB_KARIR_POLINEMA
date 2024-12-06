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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menyimpan ID pengguna
            $table->foreignId('materi_id')->constrained()->onDelete('cascade'); // Menyimpan ID materi
            $table->boolean('is_completed')->default(false); // Status apakah materi telah diselesaikan
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('progress');
    }
    };

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
        Schema::create('webinars', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('judul_web'); // Kolom untuk judul webinar
            $table->date('tanggal_web'); 
            $table->string('narasumber'); 
            $table->string('poster_web'); 
            $table->string('link_web'); 
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinars');
    }
    
};

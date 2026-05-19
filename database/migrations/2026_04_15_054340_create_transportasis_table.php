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
         Schema::create('transportasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // KRL / LRT / Trans Bekasi
            $table->string('jenis'); // krl / lrt / bus
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportasis');
    }
};

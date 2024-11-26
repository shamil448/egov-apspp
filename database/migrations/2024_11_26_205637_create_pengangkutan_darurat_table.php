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
        Schema::create('pengangkutan_darurat', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable(); // Menyimpan path atau nama file foto
            $table->string('nama_kecamatan');
            $table->string('nama_kelurahan');
            $table->string('kirim_lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengangkutan_darurat');
    }
};

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
            $table->string('foto')->nullable();
            $table->string('kirim_lokasi');
            $table->string('status');
            $table->unsignedBigInteger('rw_id');
            $table->unsignedBigInteger('petugas_pengangkutan_id')->nullable(); // Menambahkan kolom petugas_pengangkutan_id
            $table->timestamps();

            // Menambahkan relasi petugas_pengangkutan_id ke tabel users
            $table->foreign('rw_id')->references('id')->on('rw')->onDelete('cascade');
            $table->foreign('petugas_pengangkutan_id')->references('id')->on('users')->onDelete('set null'); // Menambahkan relasi ke tabel users
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

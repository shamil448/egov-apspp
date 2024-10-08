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
        Schema::create('jadwal_penjemputan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penjemputan'); // Tanggal penjemputan
            $table->time('waktu_penjemputan'); // Waktu penjemputan
            $table->enum('frekuensi', ['harian', 'mingguan', 'bulanan']); // Frekuensi penjemputan
            $table->enum('tipe_penjemputan', ['TPS', 'titik_khusus']); // Tipe penjemputan (TPS atau Titik Khusus)
            $table->string('lokasi_penjemputan')->nullable(); // Lokasi penjemputan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_penjemputan');
    }
};

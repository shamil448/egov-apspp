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
        Schema::create('laporan_harian', function (Blueprint $table) {
            $table->id();
            $table->string('alamat'); // Alamat lokasi laporan
            $table->string('muatan_sampah'); // Muatan sampah (misalnya 1 Truck)
            $table->date('tgl_pelaporan'); // Tanggal pelaporan
            $table->string('pelapor'); // Nama pelapor (misalnya Bpk.Budi)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_harian');
    }
};

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
        Schema::create('laporan_tugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwalpengangkutan_id');
            $table->string('status_pengangkutan');
            $table->text('catatan');
            $table->json('foto'); // Simpan array foto dalam JSON
            $table->timestamps();
    
            $table->foreign('jadwalpengangkutan_id')->references('id')->on('jadwal_pengangkutan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_tugas');
    }
};

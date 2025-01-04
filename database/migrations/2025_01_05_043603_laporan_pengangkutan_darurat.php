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
        Schema::create('laporan_pengangkutan_darurat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengangkutan_darurat_id');
            $table->text('catatan');
            $table->json('foto'); // Simpan array foto dalam JSON
            $table->timestamps();

            $table->foreign('pengangkutan_darurat_id')->references('id')->on('pengangkutan_darurat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pengangkutan_darurat');
    }
};

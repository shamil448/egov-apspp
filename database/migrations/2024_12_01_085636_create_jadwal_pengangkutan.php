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
        Schema::create('jadwal_pengangkutan', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->unsignedBigInteger('rw_id');
            $table->unsignedBigInteger('petugas_id');
            $table->timestamps();

            $table->foreign('rw_id')->references('id')->on('rw')->onDelete('cascade');
            $table->foreign('petugas_id')->references('id')->on('petugas_pengangkutan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pengangkutan');
    }
};

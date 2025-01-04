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
            $table->timestamps();

            $table->foreign('rw_id')->references('id')->on('pengangkutan_darurat')->onDelete('cascade');
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

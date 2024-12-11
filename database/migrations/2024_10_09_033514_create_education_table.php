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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul materi edukasi
            $table->text('content'); // Isi materi edukasi
            $table->string('author'); // Penulis atau pembuat materi
            $table->enum('type', ['article', 'video', 'course']); // Jenis materi edukasi
            $table->string('image_path')->nullable(); // Path untuk file gambar
            $table->string('video_path')->nullable(); // Path untuk file video
            $table->timestamp('published_at')->nullable(); // Tanggal dan waktu publikasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};

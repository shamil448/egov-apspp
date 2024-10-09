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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul berita
            $table->text('content'); // Isi berita
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key ke tabel categories
            $table->string('author'); // Penulis berita
            $table->timestamp('published_at')->nullable(); // Tanggal dan waktu publikasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};

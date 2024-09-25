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
        Schema::create('feedback_response', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feedback_id')->constrained('feedback_form'); // Relasi ke feedback_form
            $table->foreignId('user_id')->constrained('users'); // Relasi ke tabel users
            $table->text('response_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_response');
    }
};

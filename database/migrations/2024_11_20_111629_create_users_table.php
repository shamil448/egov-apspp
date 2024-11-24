<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama lengkap
            $table->string('alamat')->nullable(); // Alamat (opsional)
            $table->string('kontak')->nullable(); // Nomor kontak (opsional)
            $table->string('email')->unique(); // Email unik
            $table->string('password'); // Password
            $table->enum('role', ['Pemerintah', 'Petugas', 'RW'])->default('Petugas'); // Role
            $table->rememberToken(); // Token remember me
            $table->timestamps(); // Created at dan updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

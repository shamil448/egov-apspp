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
            $table->unsignedBigInteger('rw_id')->nullable(); // Foreign key untuk RW
            $table->unsignedBigInteger('petugas_pengangkutan_id')->nullable(); // Foreign key untuk Petugas
            $table->rememberToken(); // Token remember me
            $table->timestamps(); // Created at dan updated at

            // Menambahkan foreign key constraint untuk RW dan Petugas
            $table->foreign('rw_id')->references('id')->on('rw')->onDelete('set null');
            $table->foreign('petugas_pengangkutan_id')->references('id')->on('petugas_pengangkutan')->onDelete('set null');
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

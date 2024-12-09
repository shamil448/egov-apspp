<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Pemerintah',
                'alamat' => 'Jalan Merdeka No. 1',
                'kontak' => '081234567890',
                'email' => 'admin@pemerintah.com',
                'password' => Hash::make('password123'),
                'role' => 'Pemerintah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Petugas Lapangan',
                'alamat' => 'Jalan Sudirman No. 2',
                'kontak' => '081987654321',
                'email' => 'petugas@lapangan.com',
                'password' => Hash::make('password456'),
                'role' => 'Petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ketua RW',
                'alamat' => 'Jalan Harmoni No. 3',
                'kontak' => '081223344556',
                'email' => 'ketuarw@desa.com',
                'password' => Hash::make('password789'),
                'role' => 'RW',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

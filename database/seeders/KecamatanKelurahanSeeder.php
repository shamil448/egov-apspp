<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanKelurahanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            "Batam Kota" => ["Baloi Permai", "Belian", "Sukajadi", "Sungai Panas", "Taman Baloi", "Teluk Tering"],
            "Batu Aji" => ["Bukit Tempayan", "Buliang", "Kibing", "Tanjung Uncang"],
            "Batu Ampar" => ["Batu Merah", "Kampung Seraya", "Sungai Jodoh", "Tanjung Sengkuang"],
            "Belakang Padang" => ["Kasu", "Pecong", "Pemping", "Pulau Terong", "Sekanak Raya", "Tanjung Sari"],
            "Bengkong" => ["Bengkong Indah", "Bengkong Laut", "Sadai", "Tanjung Buntung"],
            "Bulang" => ["Batu Legong", "Bulang", "LintangPantai", "Gelam", "Pulau Buluh", "Setokok", "Temoyong"],
            "Galang" => ["Air Raja", "Galang Baru", "Karas", "Pulau Abang", "Rempang Cate", "Sembulang", "Sijantung", "Subang Mas"],
            "Lubuk Baja" => ["Baloi Indah", "Batu Selicin", "Kampung Pelita", "Lubuk Baja Kota", "Tanjung Uma"],
            "Nongsa" => ["Batu Besar", "Kabil", "Ngenang", "Sambau"],
            "Sagulung" => ["Sagulung Kota", "Sungai Binti", "Sungai Langkai", "Sungai Lekop", "Sungai Pelunggut", "Tembesi"],
            "Sei Beduk" => ["Duriangkang", "Mangsang", "Muka Kuning", "Tanjung Piayu"],
            "Sekupang" => ["Patam Lestari", "Sungai Harapan", "Tanjung Pinggir", "Tanjung Riau", "Tiban Baru", "Tiban Indah", "Tiban Lama"],
        ];

        foreach ($data as $kecamatan => $kelurahans) {
            // Insert Kecamatan
            $kecamatanId = DB::table('kecamatan')->insertGetId([
                'nama_kecamatan' => $kecamatan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert Kelurahan terkait
            foreach ($kelurahans as $kelurahan) {
                DB::table('kelurahan')->insert([
                    'kelurahan' => $kelurahan,
                    'kecamatan_id' => $kecamatanId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

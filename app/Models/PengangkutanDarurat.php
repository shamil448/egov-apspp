<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengangkutanDarurat extends Model
{
    use HasFactory;

    protected $table = 'pengangkutan_darurat';

    protected $fillable = [
        'foto',              // Path foto yang diunggah
        'nama_kecamatan',    // Nama kecamatan
        'nama_kelurahan',    // Nama kelurahan
        'kirim_lokasi',      // Lokasi pengangkutan
    ];
}

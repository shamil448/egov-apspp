<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    use HasFactory;

    protected $table = 'rw';

    protected $fillable = [
        'nama_rw',              // Path foto yang diunggah
        'kelurahan_id',    // Nama kecamatan
        'alamat_lengkap',    // Nama kelurahan
        'lokasi',      // Lokasi pengangkutan
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function jadwalpengangkutan()
    {
        return $this->hasMany(JadwalPengangkutan::class);
    }
}

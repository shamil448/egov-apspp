<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan'; // Nama tabel yang sesuai
    protected $fillable = ['kelurahan', 'kecamatan_id'];

    // Relasi ke model Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function jadwalpengangkutan()
    {
        return $this->hasMany(JadwalPengangkutan::class);
    }
}

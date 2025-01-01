<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPengangkutan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pengangkutan';

    protected $fillable = [
        'hari',
        'rw_id',
        'petugas_id',
    ];

    public function rw()
    {
        return $this->belongsTo(RW::class);
    }

    public function petugas()
    {
        return $this->belongsTo(PetugasPengangkutan::class);
    }

    public function laporantugas()
    {
        return $this->hasMany(LaporanTugas::class);
    }

}

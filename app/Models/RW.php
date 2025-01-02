<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    use HasFactory;

    protected $table = 'rw';

    protected $fillable = [
        'nama_rw',
        'kelurahan_id',
        'alamat_lengkap',
        'lokasi',
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

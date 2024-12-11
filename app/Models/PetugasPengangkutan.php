<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasPengangkutan extends Model
{
    use HasFactory;

    protected $table = 'petugas_pengangkutan';

    protected $fillable = [
        'nama_petugas',
        'kecamatan_id',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}

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
}

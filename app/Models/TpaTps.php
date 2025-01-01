<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpaTps extends Model
{
    use HasFactory;

    protected $table = 'tpa_tps';

    protected $fillable = [
        'kategori',
        'alamat_lengkap',
        'lokasi',
    ];
}

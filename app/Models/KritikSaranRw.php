<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KritikSaranRw extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai
    protected $table = 'kritiksaran_rw';

    protected $fillable = [
        'lokasi', 'kritik', 'saran', 'foto'
    ];

    protected $casts = [
        'foto' => 'array', // Memastikan foto disimpan sebagai array
    ];
}


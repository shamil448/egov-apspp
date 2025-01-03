<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanTugas extends Model
{
    use HasFactory;

    protected $table = 'laporan_tugas';

    protected $fillable = [
        'jadwalpengangkutan_id',   
        'status_pengangkutan', 
        'catatan', 
        'foto',
    ];

    // Accessor untuk mendapatkan array foto
    public function getFotoArrayAttribute()
    {
        // Decode foto dari JSON menjadi array
        return json_decode($this->foto, true) ?? [];
    }

    // Mutator untuk menyimpan foto sebagai JSON
    public function setFotoAttribute($value)
    {
        $this->attributes['foto'] = json_encode($value);
    }
    
    public function jadwalpengangkutan()
    {
        return $this->belongsTo(JadwalPengangkutan::class);
    }
}
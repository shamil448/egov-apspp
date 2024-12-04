<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'kelurahan';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'kecamatan_id',
        'kelurahan',
    ];

    /**
     * Define the relationship with the Kecamatan model.
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function jadwalpengangkutan()
    {
        return $this->hasMany(JadwalPengangkutan::class);
    }
}

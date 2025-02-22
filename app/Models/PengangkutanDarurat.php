<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengangkutanDarurat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengangkutan_darurat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto',
        'nama_kecamatan',
        'nama_kelurahan',
        'kirim_lokasi',
        'status',
        'rw_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the RW (related model) that owns the PengangkutanDarurat.
     */
    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id');
    }
}

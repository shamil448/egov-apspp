<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengangkutanDarurat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laporan_pengangkutandarurat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pengangkutandarurat_id',
        'status_pengangkutan',
        'catatan',
        'foto',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'foto' => 'array', // JSON field cast to array
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the PengangkutanDarurat that owns the LaporanPengangkutanDarurat.
     */
    public function pengangkutanDarurat()
    {
        return $this->belongsTo(PengangkutanDarurat::class, 'pengangkutandarurat_id');
    }
}

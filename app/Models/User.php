<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\RW;
use App\Models\PetugasPengangkutan;
use App\Models\JadwalPengangkutan;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'kontak',
        'role',
        'rw_id',
        'petugas_pengangkutan_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi dengan model RW
    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id');
    }

    // Relasi dengan model PetugasPengangkutan
    public function petugasPengangkutan()
    {
        return $this->belongsTo(PetugasPengangkutan::class, 'petugas_pengangkutan_id');
    }

}

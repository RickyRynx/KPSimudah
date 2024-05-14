<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'ukm_id',
        'waktu_mulai',
        'waktu_selesai',
        'hari',
        'tempat'
    ];

    // Jadwal.php
    public function ukm()
    {
        return $this->belongsTo(Ukm::class, 'ukm_id');
    }

    // public function ketuaMahasiswa()
    // {
    //     return $this->belongsTo(Ukm::class, 'ketuaMahasiswa_id');
    // }

    // public function pelatih()
    // {
    //     return $this->belongsTo(Ukm::class, 'pelatih_id');
    // }

    public function jadwals()
{
    return $this->hasMany(Jadwal::class, 'ukm_id');
}
}

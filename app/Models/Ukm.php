<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    protected $fillable = [
        'nama_ukm',
        'pembina_id',
        'pelatih_id',
        'ketuaMahasiswa_id',
        'status',
        'kategori'
    ];

    public function pembina()
    {
        return $this->belongsTo(User::class, 'pembina_id');
    }

    public function pelatih()
    {
        return $this->belongsTo(User::class, 'pelatih_id');
    }

    public function ketuaMahasiswa()
    {
        return $this->belongsTo(User::class, 'ketuaMahasiswa_id');
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'ukm_id');
    }

    public function jadwalsAsKetuaMahasiswa()
    {
        return $this->hasMany(Jadwal::class, 'ketuaMahasiswa_id');
    }

    public function jadwalsAsPelatih()
    {
        return $this->hasMany(Jadwal::class, 'pelatih_id');
    }

    public function pengumumen()
    {
        return $this->hasMany(Pengumuman::class, 'ukm_id');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'ukm_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'ukm_id');
    }
}


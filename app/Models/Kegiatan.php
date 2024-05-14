<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_usulan',
        'nama_kegiatan',
        'afiliasi_lomba',
        'file_usulan',
        'skala_lomba',
        'laporan_lomba',
        'ukm_id'
    ];

    public function kegiatans()
        {
            return $this->hasMany(Kegiatan::class, 'ukm_id');
        }
}

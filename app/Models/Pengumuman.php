<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi_pengumuman',
        'ketuaMahasiswa_id',
        'waktu_upload',
        'ukm_id',
    ];

    public function ketuaMahasiswa()
    {
        return $this->belongsTo(User::class, 'ketuaMahasiswa_id');
    }
}


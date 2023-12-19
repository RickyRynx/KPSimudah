<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_kegiatan',
        'agenda_kegiatan',
        'lokasi_kegiatan',
        'penanggung_jawab',
        'pelatih'
    ];
}

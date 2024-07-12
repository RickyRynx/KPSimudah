<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiDetail extends Model
{
    protected $fillable = [
        'absensi_id',
        'anggota_id',
        'status_absensi',
        'keterangan_absensi'
    ];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!in_array($model->status_absensi, ['H', 'I', 'A'])) {
                throw new \Exception('Status absensi harus H, I, atau A.');
            }
        });

    }


}

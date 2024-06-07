<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'npm',
        'nama_mahasiswa',
        'nomor_hp',
        'email',
        'jabatan',
        'ukm_id',
        'status_user'
        ];

        // Dalam model Ukm
        public function anggotas()
        {
            return $this->hasMany(Anggota::class, 'ukm_id');
        }

        public function ukm()
        {
            return $this->belongsTo(Ukm::class);
        }

        public function absensiDetails()
        {
            return $this->hasMany(AbsensiDetail::class);
        }

}

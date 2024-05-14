<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'user_id',
        'ukm_id',
        'keterangan',
        'image',
        'kehadiran_pelatih',
        'waktu_mulai',
        'waktu_selesai',
        ];

        public function namaMahasiswa()
        {
            return $this->belongsTo(Anggota::class, 'nama_mahasiswa');
        }

        public function ukm()
        {
            return $this->belongsTo(Ukm::class, 'ukm_id');
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function absensiDetails()
        {
            return $this->hasMany(AbsensiDetail::class);
        }


}

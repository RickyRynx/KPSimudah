<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'jumlah_rusak',
        'jumlah_bagus',
        'keterangan',
        'ukm_id'
    ];
}

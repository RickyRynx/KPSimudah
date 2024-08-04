<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisHistory extends Model
{
    protected $fillable = ['inventaris_id', 'action', 'old_values', 'new_values'];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
    ];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }

    public function getOldValuesStringAttribute()
    {
        return $this->formatValues($this->old_values);
    }

    public function getNewValuesStringAttribute()
    {
        return $this->formatValues($this->new_values);
    }

    private function formatValues($values)
    {
        if (is_array($values)) {
            $formatted = '';
            if (isset($values['jumlah_rusak'])) {
                $formatted .= 'Barang inventaris yang rusak: ' . $values['jumlah_rusak'] . '. ';
            }
            if (isset($values['jumlah_bagus'])) {
                $formatted .= 'Barang inventaris yang bagus: ' . $values['jumlah_bagus'] . '. ';
            }
            if (isset($values['jumlah'])) {
                $formatted .= 'Jumlah barang inventaris: ' . $values['jumlah'] . '. ';
            }
            if (isset($values['keterangan'])) {
                $formatted .= 'Keterangan: ' . $values['keterangan'] . '. ';
            }
            return rtrim($formatted, '. ');
        }
        return '';
    }
}

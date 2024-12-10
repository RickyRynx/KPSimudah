<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEmail extends Model
{
    protected $fillable = [
        'nama',
        'email',
        ];
}

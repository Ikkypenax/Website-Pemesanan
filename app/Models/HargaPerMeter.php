<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaPerMeter extends Model
{
    use HasFactory;

    protected $table = 'harga_per_meter';

    protected $fillable = [
        'jenis',
        'harga',
        'kategori'
    ];
}


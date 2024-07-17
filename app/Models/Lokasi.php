<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table='lokasis';
    protected $fillable = [
        'nama',
        'wa',
        'kategori',
        'jenis',
        'panjang',
        'lebar',
        'provinsi',
        'kabupaten',
        'status'
    ];
}

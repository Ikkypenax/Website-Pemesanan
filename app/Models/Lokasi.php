<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'list_order';
    protected $fillable = [
        'nama',
        'wa',
        'kategori',
        'jenis',
        'panjang',
        'lebar',
        'result',
        'provinsi',
        'kabupaten',
        'status',
        'id_harga_per_meter',
    ];

    public function hargaPerMeter()
    {
        return $this->belongsTo(HargaPerMeter::class, 'jenis', 'jenis');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'nama_kategori', 'id');
    }

    public function tambahRp()
    {
        return $this->hasOne(tambahRp::class);
    }
}

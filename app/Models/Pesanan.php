<?php

namespace App\Models;

use App\Models\Panel;
use App\Models\TambahBiaya;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = [
        'nama',
        'wa',
        'kategori',
        'jenis',
        'panjang',
        'lebar',
        'hasil',
        'provinsi',
        'kabupaten',
        'status',
        'id_harga_per_meter',
    ];

    public function panel()
    {
        return $this->belongsTo(Panel::class, 'jenis', 'jenis');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'nama_kategori', 'id');
    }

    public function addfee()
    {
        return $this->hasOne(TambahBiaya::class, 'lokasi_id');
    }
}

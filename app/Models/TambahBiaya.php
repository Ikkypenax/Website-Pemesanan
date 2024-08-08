<?php

namespace App\Models;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TambahBiaya extends Model
{
    use HasFactory;
    protected $table = 'tambah_biaya';

    protected $fillable = [
        'biaya_transportasi',
        'biaya_pemasangan',
        'biaya_jasa',
        'biaya_service',
        'total_biaya',
        'lokasi_id',
    ];

    public function listorder()
    {
        return $this->belongsTo(Pesanan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TambahRp extends Model
{
    use HasFactory;
    protected $table = 'add_fee';

    protected $fillable = [
        'biaya_transportasi',
        'biaya_pemasangan',
        'biaya_jasa',
        'biaya_service',
        'total_biaya',
        'lokasi_id',
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}

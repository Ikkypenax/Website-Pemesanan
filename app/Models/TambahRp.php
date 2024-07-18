<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TambahRp extends Model
{
    use HasFactory;
    protected $table = 'tambah_rp';

    protected $fillable = [
        'biaya_transportasi',
        'biaya_pemasangan',
        'biaya_jasa',
        'biaya_service',
    ];
}

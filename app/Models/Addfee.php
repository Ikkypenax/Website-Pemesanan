<?php

namespace App\Models;

use App\Models\Listorder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Addfee extends Model
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

    public function listorder()
    {
        return $this->belongsTo(Listorder::class);
    }
}

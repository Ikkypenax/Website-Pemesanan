<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeRent extends Model
{
    use HasFactory;
    protected $table = 'fee_rent';
    protected $fillable = [
        'fee_transport',
        'fee_install',
        'fee_service',
        'fee_repair',
        'fee_support',
        'fee_total',
        'rent_id'
    ];

    public $timestamps = false;

    public function rents()
    {
        return $this->belongsTo(Rents::class, 'rent_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFee extends Model
{
    use HasFactory;

    protected $table = 'add_fee';
    protected $fillable = [
        'fee_transport',
        'fee_install',
        'fee_service',
        'fee_repair',
        'fee_total',
        'order_id'
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }
}

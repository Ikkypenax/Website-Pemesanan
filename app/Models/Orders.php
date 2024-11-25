<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'wa',
        'regency',
        'length',
        'width',
        'result',
        'status',
        'created_at',
        'updated_at',
        'provinces_id',
        'panel_id',
        'user_id',
        'order_code', // Tambahkan kolom order_code
    ];

    public function panel()
    {
        return $this->belongsTo(Panels::class, 'panel_id');
    }

    public function provinces()
    {
        return $this->belongsTo(Provinces::class, 'provinces_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regencies::class, 'regency')->where('province_id', $this->provinces_id);
    }

    public function addfee()
    {
        return $this->hasOne(AddFee::class, 'order_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}

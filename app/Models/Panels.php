<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panels extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category',
        'price',
        'rental',
    ];

    public $timestamps = false;

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'panel_id');
    }

    public function rents()
    {
        return $this->belongsTo(Rents::class, 'panel_id');
    }
}

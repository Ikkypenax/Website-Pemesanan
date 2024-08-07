<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panel extends Model
{
    use HasFactory;

    protected $table = 'panel';

    protected $fillable = [
        'jenis',
        'harga',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}

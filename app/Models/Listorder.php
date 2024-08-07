<?php

namespace App\Models;

use App\Models\Panel;
use App\Models\Addfee;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Listorder extends Model
{
    use HasFactory;
    protected $table = 'list_order';
    protected $fillable = [
        'nama',
        'wa',
        'kategori',
        'jenis',
        'panjang',
        'lebar',
        'result',
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
        return $this->belongsTo(Category::class, 'nama_kategori', 'id');
    }

    public function addfee()
    {
        return $this->hasOne(Addfee::class, 'lokasi_id');
    }
}

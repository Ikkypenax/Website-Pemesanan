<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rents extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_at',
        'updated_at',
        'rent_code',
        'nama',
        'wa',
        'tgl_sewa',
        'tgl_selesai',
        'mulai',
        'selesai',
        'kabupaten',
        'keterangan',
        'panjang',
        'lebar',
        'genset',
        'level',
        'total',
        'status',
        'provinces_id',
        'panel_id',
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
        return $this->belongsTo(Regencies::class, 'kabupaten')->where('province_id', $this->provinces_id);
    }

    public function feerent()
    {
        return $this->hasOne(FeeRent::class, 'rent_id');
    }

    public function getStatusOptions()
    {
        $options = [
            'Prosses' => 'Prosses',
            'Reject' => 'Reject',
        ];

        // Tambahkan opsi jika fee_total > 0
        if ($this->feerent && $this->feerent->fee_total > 0) {
            $options['Approve'] = 'Approve';
            $options['Finish'] = 'Finish';
        }

        return $options;
    }
}

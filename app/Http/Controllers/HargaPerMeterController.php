<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Models\HargaPerMeter;

class HargaPerMeterController extends Controller
{
public function create()
{
    $hargaPerMeter = HargaPerMeter::all(); // Misalnya, ambil harga pertama\

    // dd($hargaPerMeter);
    return view('lokasi.create', compact('hargaPerMeter'));
}
}

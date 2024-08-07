<?php

namespace App\Http\Controllers;

use App\Models\Panel;
// use App\Models\Lokasi;
use Illuminate\Http\Request;
// use App\Models\HargaPerMeter;

class HargaPerMeterController extends Controller
{
public function create()
{
    $hargaPerMeter = Panel::all(); 
    return view('lokasi.create', compact('hargaPerMeter'));
}
}

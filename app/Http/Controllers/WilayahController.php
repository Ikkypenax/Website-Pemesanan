<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;

class WilayahController extends Controller
{
    public function form()
    {
        $provinces = Province::all();
        return view('lokasi.create', compact('provinces'));
    }
    public function getkabupaten(request $request){
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        foreach($kabupatens as $kabupaten){
            echo "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\TambahRp;
use Illuminate\Http\Request;

class BiayaLainController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            "transportasi" => "required|numeric",
            "pemasangan" => "required|numeric",
            "jasa" => "required|numeric",
            "service" => "required|numeric",
            "lokasi_id" => "required",
        ]);

         
    $lokasi = Lokasi::findOrFail($request->lokasi_id);

    $harga = $lokasi->result;

    $total_biaya = $harga + $request->transportasi + $request->pemasangan + $request->jasa + $request->service;


        TambahRp::create([
            "biaya_transportasi" => $request->transportasi,
            "biaya_pemasangan" => $request->pemasangan,
            "biaya_jasa" => $request->jasa,
            "biaya_service" => $request->service,
            "total_biaya" => $total_biaya,
            "lokasi_id" => $request->lokasi_id,
        ]);

        return redirect()->back()
            ->with('success', 'Lokasi created successfully.');
    }

    // public function update(Request $request, TambahRp $biaya){
    //     $request->validate([
    //         "transportasi" => "required|numeric",
    //         "pemasangan" => "required|numeric",
    //         "jasa" => "required|numeric",
    //         "service" => "required|numeric",
    //         "lokasi_id" => "required",
    //     ]);
    
    //     $lokasi = Lokasi::all();
    //     $biaya = $lokasi->tambahRP->lokasi_id ?? null;
    //     $biaya = TambahRp::findOrFail('lokasi_id');
    //     $biaya->update([
    //         "biaya_transportasi" => $request->transportasi,
    //         "biaya_pemasangan" => $request->pemasangan,
    //         "biaya_jasa" => $request->jasa,
    //         "biaya_service" => $request->service,
    //         "lokasi_id" => $request->lokasi_id,
    //     ]);
    
    //     return redirect()->back()
    //         ->with('success', 'Lokasi updated successfully.');
    // }
    

    public function update(Request $request, $id){
        $request->validate([
            "transportasi" => "required|numeric",
            "pemasangan" => "required|numeric",
            "jasa" => "required|numeric",
            "service" => "required|numeric",
            "lokasi_id" => "required",
        ]);
    
        $biaya = TambahRp::where('lokasi_id', $id)->firstOrFail();
        $biaya->update([
            "biaya_transportasi" => $request->transportasi,
            "biaya_pemasangan" => $request->pemasangan,
            "biaya_jasa" => $request->jasa,
            "biaya_service" => $request->service,
            "lokasi_id" => $request->lokasi_id,
        ]);
    
        return redirect()->back()
            ->with('success', 'Lokasi updated successfully.');
    }
    
}

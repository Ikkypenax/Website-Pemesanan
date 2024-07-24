<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\TambahRp;
use Illuminate\Http\Request;

class BiayaLainController extends Controller
{
    // public function biaya($id)
    // {
    //     $biayaTotal = Lokasi::select('result')->where('id', $id)->first();
    //     $x = 100;
    // }

    // simpan hasil form
    // 1 biaya transpor 
    // 2 biaya produksi dll

    // total semuanya 
    // $biayaTotal + 

    // create data di tambah_rp

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "transportasi" => "required|numeric",
            "pemasangan" => "required|numeric",
            "jasa" => "required|numeric",
            "service" => "required|numeric",
            // "total_biaya" => "required",
            "lokasi_id" => "required",
        ]);

         // Ambil data lokasi dari database
    $lokasi = Lokasi::findOrFail($request->lokasi_id);

    // Ambil nilai 'result' dari tabel 'lokasis'
    $harga = $lokasi->result;

    // Hitung total biaya
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
}

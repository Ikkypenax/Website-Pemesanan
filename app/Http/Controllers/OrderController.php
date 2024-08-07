<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Regency;
use App\Models\Kategori;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\HargaPerMeter;

class OrderController extends Controller
{
    public function create()
    {
        $barang = HargaPerMeter::with('kategori')->get();
        $kategori = Kategori::whereIn('id', [1, 2])->get();
        $provinces = Province::all();
        return view('order', compact('barang', 'kategori', 'provinces'));
    }

    public function getJenis($kategori_nama)
    {
        $kategori = Kategori::where('nama_kategori', $kategori_nama)->first();
        $jenis = HargaPerMeter::where('kategori_id', $kategori->id)->get(['id', 'harga', 'jenis']);
        return response()->json($jenis);
    }

    public function getHarga($jenis)
    {
        $harga = HargaPerMeter::where('jenis', $jenis)->first();
        return response()->json($harga);
    }

    public function getkabupaten($id_provinsi)
    {
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        return response()->json($kabupatens);
    }


    public function store(Request $request)
    {

        $namaProvinsi = Province::find($request->provinsi)->name;
        $namaKabupaten = Regency::find($request->kabupaten)->name;

        $namaJenis = HargaPerMeter::find($request->jenis)->jenis;


        $request->validate([
            "nama" => "required",
            "wa" => "required",
            "kategori" => "required",
            "jenis" => "required",
            "panjang" => "required",
            "lebar" => "required",
            "provinsi" => "required",
            "kabupaten" => "required",
            "result" => "required",
        ]);

        Lokasi::create([
            "nama" => $request->nama,
            "wa" => $request->wa,
            "jenis" => $namaJenis,
            "kategori" => $request->kategori,
            "panjang" => $request->panjang,
            "lebar" => $request->lebar,
            "provinsi" => $namaProvinsi,
            "kabupaten" => $namaKabupaten,
            "result" => $request->result,
        ]);


        return redirect()->back()
            ->with('success', 'Pesanan berhasil dibuat.');
    }
}

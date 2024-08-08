<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Panel;
use App\Models\Regency;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Province;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $barang = Panel::with('kategori')->get();
        $kategori = Kategori::whereIn('id', [1, 2])->get();
        $provinces = Provinsi::all();
        return view('order', compact('barang', 'kategori', 'provinces'));
    }

    public function getJenis($kategori_nama)
    {
        $kategori = Kategori::where('nama_kategori', $kategori_nama)->first();
        $jenis = Panel::where('kategori_id', $kategori->id)->get(['id', 'harga', 'jenis']);
        return response()->json($jenis);
    }

    public function getHarga($jenis)
    {
        $harga = Panel::where('jenis', $jenis)->first();
        return response()->json($harga);
    }

    public function getkabupaten($id_provinsi)
    {
        $kabupatens = Kabupaten::where('province_id', $id_provinsi)->get();
        return response()->json($kabupatens);
    }


    public function store(Request $request)
    {

        $namaProvinsi = Provinsi::find($request->provinsi)->name;
        $namaKabupaten = Kabupaten::find($request->kabupaten)->name;

        $namaJenis = Panel::find($request->jenis)->jenis;


        $request->validate([
            "nama" => "required",
            "wa" => "required",
            "kategori" => "required",
            "jenis" => "required",
            "panjang" => "required",
            "lebar" => "required",
            "provinsi" => "required",
            "kabupaten" => "required",
            "hasil" => "required",
        ]);

        Pesanan::create([
            "nama" => $request->nama,
            "wa" => $request->wa,
            "jenis" => $namaJenis,
            "kategori" => $request->kategori,
            "panjang" => $request->panjang,
            "lebar" => $request->lebar,
            "provinsi" => $namaProvinsi,
            "kabupaten" => $namaKabupaten,
            "hasil" => $request->hasil,
        ]);


        return redirect()->back()
            ->with('success', 'Pesanan berhasil dibuat.');
    }
}

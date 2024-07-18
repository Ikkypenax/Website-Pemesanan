<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Regency;
use App\Models\Kategori;
use App\Models\Province;
use App\Models\TambahRp;
use Illuminate\Http\Request;
use App\Models\HargaPerMeter;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::with(['hargaPerMeter', 'kategori'])->get();
        return view('lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        $barang = HargaPerMeter::with('kategori')->get();
        $kategori = Kategori::whereIn('id', [1, 2])->get();
        $provinces = Province::all();
        return view('lokasi.create', compact('barang', 'kategori', 'provinces'));
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


    public function getkabupaten(request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        foreach ($kabupatens as $kabupaten) {
            echo "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
    }


    public function store(Request $request)
    {
        // Ambil nama provinsi dan kabupaten berdasarkan ID yang diterima
        $namaProvinsi = Province::find($request->provinsi)->name;
        $namaKabupaten = Regency::find($request->kabupaten)->name;

        $namaJenis = HargaPerMeter::find($request->jenis)->jenis;

        // Validasi input
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

        // Buat entri baru di database
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

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi created successfully.');
    }



    public function show(Lokasi $lokasi)
    {
        return view('lokasi.show', compact('lokasi'));
    }

    public function edit(Lokasi $lokasi, HargaPerMeter $barang)
    {
        $barang = HargaPerMeter::all();
        $kategori = Kategori::all();
        return view('lokasi.edit', compact('barang', 'lokasi', 'kategori'));
        
    }

    public function update(Request $request, Lokasi $lokasi)
    {

        $lokasi = Lokasi::all();

        $request->validate([
            "nama" => "nullable",
            "wa" => "nullable",
            "kategori" => "nullable",
            "jenis" => "nullable",
            "panjang" => "nullable",
            "lebar" => "nullable",
            "provinsi" => "nullable",
            "kabupaten" => "nullable",
            "result" => "nullable",
        ]);


        // $lokasi->update($request->all());

        
        

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi updated successfully');
    }

    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi deleted successfully');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $status = Lokasi::find($id);
        $status->update(['status' => $request->status]);

        return back()->with('success', 'Updated successfully.');
    }

    public function nota()
    {
        $tambahRp = TambahRp::all();
        return view('tambah_rp.update', compact('tambahRp'));
    }
}


 
<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\HargaPerMeter;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        // dd('lorem');
        $hargaPerMeter = HargaPerMeter::all(); // Misalnya, ambil harga pertama\
        $provinces = Province::all();
        return view('lokasi.create', compact('hargaPerMeter', 'provinces'));
    }

    public function getHarga($jenis)
    {
        $harga = HargaPerMeter::where('jenis', $jenis)->first();
        return response()->json($harga);
        
    }

    public function getJenis($kategori)
    {
        $jenis = HargaPerMeter::where('kategori', $kategori)->get();
        return response()->json($jenis);
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
        // dd($request->all());
        
        $namaProvinsi = Province::find($request->provinsi)->name;
        $namaKabupaten = Regency::find($request->kabupaten)->name;
        

        $request->validate([
            "nama" => "required",
            "wa" => "required",
            "kategori" => "required",
            "jenis" => "required",
            "panjang" => "required",
            "lebar" => "required",
            "provinsi" => "required",
            "kabupaten" => "required",
            "result" => "required"

        ]);

        // $namaJenis = HargaPerMeter::find($request->jenis)->name;
        // $namaKategori = HargaPerMeter::find($request->kategori)->name;
        // $namaHarga = HargaPerMeter::find($request->harga);

        Lokasi::create([
            "nama" => ($request->nama),
            "wa" => ($request->wa),
            "jenis" => ($request->jenis),
            "kategori" => ($request->kategori),
            "panjang" => ($request->panjang),
            "lebar" => ($request->lebar),
            "provinsi" => ($namaProvinsi),
            "kabupaten" => ($namaKabupaten),
            "result" => ($request->result)
        ]);

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi created successfully.');
    }

    public function show(Lokasi $lokasi)
    {
        return view('lokasi.show', compact('lokasi'));
    }

    public function edit(Lokasi $lokasi)
    {
        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'provinsi' => 'required',
            'kabupaten' => 'required',
        ]);

        $lokasi->update($request->all());

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
}


// onchange -> sumbmit pilihan selcet 
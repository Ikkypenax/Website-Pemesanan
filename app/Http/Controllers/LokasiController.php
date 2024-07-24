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

    
        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi created successfully.');
    }



    public function show(Lokasi $lokasi)
    {
        return view('lokasi.show', compact('lokasi'));
    }

    public function edit($id)
    {
        // dd($id);
        $lokasi = Lokasi::with('tambahRp')->find($id);
        $barang = HargaPerMeter::all();
        $kategori = Kategori::all();
        // dd($lokasi->tambahRp);
        return view('lokasi.edit', compact('barang', 'kategori', 'lokasi'));
    }

    public function update(Request $request, Lokasi $lokasi)
    {

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

        $lokasi->nama = $request->input('nama', $lokasi->nama);
        $lokasi->wa = $request->input('wa', $lokasi->wa);
        $lokasi->kategori = $request->input('kategori', $lokasi->kategori);
        $lokasi->jenis = $request->input('jenis', $lokasi->jenis);
        $lokasi->panjang = $request->input('panjang', $lokasi->panjang);
        $lokasi->lebar = $request->input('lebar', $lokasi->lebar);
        $lokasi->provinsi = $request->input('provinsi', $lokasi->provinsi);
        $lokasi->kabupaten = $request->input('kabupaten', $lokasi->kabupaten);
        $lokasi->result = $request->input('result', $lokasi->result);

        $lokasi->save();
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

    // public function nota()
    // {
    //     $tambahRp = TambahRp::all();
    //     return view('tambah_rp.update', compact('tambahRp'));
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use App\Models\Addfee;
use App\Models\Pesanan;
// use App\Models\Lokasi;
// use App\Models\Kategori;
// use App\Models\HargaPerMeter;
// use App\Models\Listorder;
use App\Models\Regency;
use App\Models\Kategori;
use App\Models\Province;
use Illuminate\Http\Request;


class PesananController extends Controller
{
    public function index()
    {
        $lokasi = Pesanan::with(['panel', 'kategori'])->orderBy('created_at', 'desc')->get();
        return view('lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        $barang = Panel::with('kategori')->get();
        $kategori = Kategori::whereIn('id', [1, 2])->get();
        $provinces = Province::all();
        return view('lokasi.create', compact('barang', 'kategori', 'provinces'));
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


    public function getkabupaten(request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        foreach($kabupatens as $kabupaten){
            echo "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
    }


    public function store(Request $request)
    {

        $namaProvinsi = Province::find($request->provinsi)->name;
        $namaKabupaten = Regency::find($request->kabupaten)->name;

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


        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan created successfully.');
    }

    public function edit($id)
    {

        $lokasi = Pesanan::with('addfee')->find($id);
        $barang = Panel::all();
        $kategori = Kategori::all();

        return view('lokasi.edit', compact('barang', 'kategori', 'lokasi'));
    }

    public function update(Request $request, Pesanan $lokasi)
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
            "hasil" => "required",
        ]);

        $lokasi->nama = $request->input('nama', $lokasi->nama);
        $lokasi->wa = $request->input('wa', $lokasi->wa);
        $lokasi->kategori = $request->input('kategori', $lokasi->kategori);
        $lokasi->jenis = $request->input('jenis', $lokasi->jenis);
        $lokasi->panjang = $request->input('panjang', $lokasi->panjang);
        $lokasi->lebar = $request->input('lebar', $lokasi->lebar);
        $lokasi->provinsi = $request->input('provinsi', $lokasi->provinsi);
        $lokasi->kabupaten = $request->input('kabupaten', $lokasi->kabupaten);
        $lokasi->hasil = $request->input('hasil', $lokasi->hasil);

        $lokasi->save();

        return redirect()->route('lokasi.index')
            ->with('success', 'Pesanan updated successfully');
    }

    public function show($id)
    {
        $lokasi = Pesanan::with('addfee')->find($id);

        return view('lokasi.show', compact('lokasi'));
    }

    public function sendInvoice($id)
{
    $lokasi = Pesanan::with('addfee')->find($id);

    $nama = $lokasi->nama;
    $wa = $lokasi->wa;
    $kategori = $lokasi->kategori;
    $jenis = $lokasi->jenis;
    $hargaPerMeter = $lokasi->panel ? 'Rp. ' . number_format($lokasi->panel->harga, 0, ',', '.') : 'Rp. 0';
    $panjangLebar = $lokasi->panjang . ' x ' . $lokasi->lebar . ' Meter';
    $harga = $lokasi->hasil ? 'Rp. ' . number_format($lokasi->hasil, 0, ',', '.') : 'Rp. 0';
    $provinsi = $lokasi->provinsi;
    $kabupaten = $lokasi->kabupaten;
    $transportasi = $lokasi->addfee->biaya_transportasi ? 'Rp. ' . number_format($lokasi->addfee->biaya_transportasi, 0, ',', '.') : '-';
    $pemasangan = $lokasi->addfee->biaya_pemasangan ? 'Rp. ' . number_format($lokasi->addfee->biaya_pemasangan, 0, ',', '.') : '-';
    $jasa = $lokasi->addfee->biaya_jasa ? 'Rp. ' . number_format($lokasi->addfee->biaya_jasa, 0, ',', '.') : '-';
    $service = $lokasi->addfee->biaya_service ? 'Rp. ' . number_format($lokasi->addfee->biaya_service, 0, ',', '.') : '-';
    $total = $lokasi->addfee->total_biaya ? 'Rp. ' . number_format($lokasi->addfee->total_biaya, 0, ',', '.') : '-';

    if (substr($wa, 0, 1) === '0') {
        $wa = '+62' . substr($wa, 1);
    }

    $message = "Detail Pesanan:\n\n"
             . "Nama: $nama\n"
             . "Kategori: $kategori\n"
             . "Jenis: $jenis\n"
             . "Harga Per Meter: $hargaPerMeter\n"
             . "Panjang x Lebar: $panjangLebar\n"
             . "Harga: $harga\n\n"
             . "Provinsi: $provinsi\n"
             . "Kabupaten: $kabupaten\n"
             . "Transportasi: $transportasi\n"
             . "Pemasangan: $pemasangan\n"
             . "Jasa: $jasa\n"
             . "Service: $service\n"
             . "Total Keseluruhan: $total\n";

             $whatsappUrl = "https://web.whatsapp.com/send?phone=$wa&text=" . urlencode($message);

    return redirect($whatsappUrl);
}

    public function destroy($id)
    {
        $lokasi = Pesanan::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan deleted successfully');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $status = Pesanan::find($id);
        $status->update(['status' => $request->status]);

        return back()->with('success', 'Status Updated successfully.');
    }
}

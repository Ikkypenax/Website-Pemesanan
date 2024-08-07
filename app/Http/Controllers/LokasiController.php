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
        $lokasi = Lokasi::with(['hargaPerMeter', 'kategori'])->orderBy('created_at', 'desc')->get();
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


        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan created successfully.');
    }

    public function edit($id)
    {

        $lokasi = Lokasi::with('tambahRp')->find($id);
        $barang = HargaPerMeter::all();
        $kategori = Kategori::all();

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

        return redirect()->route('lokasi.index')
            ->with('success', 'Pesanan updated successfully');
    }

    public function show($id)
    {
        $lokasi = Lokasi::with('tambahRp')->find($id);

        return view('lokasi.show', compact('lokasi'));
    }

    public function sendInvoice($id)
{
    $lokasi = Lokasi::with('tambahRp')->find($id);

    $nama = $lokasi->nama;
    $wa = $lokasi->wa;
    $kategori = $lokasi->kategori;
    $jenis = $lokasi->jenis;
    $hargaPerMeter = $lokasi->hargaPerMeter ? 'Rp. ' . number_format($lokasi->hargaPerMeter->harga, 0, ',', '.') : 'Rp. 0';
    $panjangLebar = $lokasi->panjang . ' x ' . $lokasi->lebar . ' Meter';
    $harga = $lokasi->result ? 'Rp. ' . number_format($lokasi->result, 0, ',', '.') : 'Rp. 0';
    $provinsi = $lokasi->provinsi;
    $kabupaten = $lokasi->kabupaten;
    $transportasi = $lokasi->tambahRp->biaya_transportasi ? 'Rp. ' . number_format($lokasi->tambahRp->biaya_transportasi, 0, ',', '.') : '-';
    $pemasangan = $lokasi->tambahRp->biaya_pemasangan ? 'Rp. ' . number_format($lokasi->tambahRp->biaya_pemasangan, 0, ',', '.') : '-';
    $jasa = $lokasi->tambahRp->biaya_jasa ? 'Rp. ' . number_format($lokasi->tambahRp->biaya_jasa, 0, ',', '.') : '-';
    $service = $lokasi->tambahRp->biaya_service ? 'Rp. ' . number_format($lokasi->tambahRp->biaya_service, 0, ',', '.') : '-';
    $total = $lokasi->tambahRp->total_biaya ? 'Rp. ' . number_format($lokasi->tambahRp->total_biaya, 0, ',', '.') : '-';

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
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan deleted successfully');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $status = Lokasi::find($id);
        $status->update(['status' => $request->status]);

        return back()->with('success', 'Status Updated successfully.');
    }
}

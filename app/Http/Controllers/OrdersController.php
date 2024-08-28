<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Panels;
use App\Models\Provinces;
use App\Models\Regencies;
use Illuminate\Http\Request;

class OrdersController extends Controller
{   
    public function index()
    {
        $lokasi = Orders::with(['panel', 'provinces', 'regency', 'addfee'])->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('lokasi'));
    }

    public function create()
    {
        $panel = Panels::select('category')->distinct()->get();
        $provinces = Provinces::all();
        $regency = Regencies::all();
        return view('orders.create', compact('panel', 'provinces', 'regency'));
    }

    public function getType($category_name)
    {
        $types = Panels::where('category', $category_name)->get();
        return response()->json($types);
    }

    public function getRegencies(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regencies::where('province_id', $province_id)->get();

        if ($regencies->isEmpty()) {
            return response()->json(['message' => 'No regencies found'], 404);
        }

        $options = '';
        foreach ($regencies as $regency) {
            $options .= "<option value='{$regency->id}'>{$regency->name}</option>";
        }

        return response()->json($options);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "wa" => "required",
            'regency' => "required|exists:regencies,id",
            "length" => "required|numeric",
            "width" => "required|numeric",
            "result" => "required|numeric",
            'provinces_id' => "required|exists:provinces,id",
            'panel_id' => "required|exists:panels,id",
        ]);

        $regency = Regencies::find($request->input('regency'))->name;

        Orders::create([
            "name" => $request->name,
            "wa" => $request->wa,
            "regency" => $regency,
            "length" => $request->length,
            "width" => $request->width,
            "result" => $request->result,
            "status" => 'Prosses',
            "provinces_id" => $request->provinces_id,
            "panel_id" => $request->panel_id,
        ]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function edit($id)
    {

        $lokasi = Orders::with('addfee')->find($id);
        $panel = Panels::all();

        return view('orders.edit', compact('panel', 'lokasi'));
    }

    public function update(Request $request, Orders $lokasi)
    {

        $request->validate([
            "name" => "required",
            "wa" => "required",
            "category" => "required",
            "type" => "required",
            "length" => "required",
            "width" => "required",
            "province_id" => "required",
            "regency" => "required",
            "result" => "required",
        ]);

        $lokasi->name = $request->input('name', $lokasi->name);
        $lokasi->wa = $request->input('wa', $lokasi->wa);
        $lokasi->category = $request->input('category', $lokasi->category);
        $lokasi->type = $request->input('type', $lokasi->type);
        $lokasi->length = $request->input('length', $lokasi->length);
        $lokasi->width = $request->input('width', $lokasi->width);
        $lokasi->province_id = $request->input('province_id', $lokasi->province_id);
        $lokasi->regency = $request->input('regency', $lokasi->regency);
        $lokasi->result = $request->input('result', $lokasi->result);

        $lokasi->save();

        return redirect()->route('orders.index')
            ->with('success', 'Orders updated successfully');
    }

    public function show($id)
    {
        $lokasi = Orders::with('addfee')->find($id);

        return view('orders.show', compact('lokasi'));
    }

    public function sendInvoice($id)
    {
        $lokasi = Orders::with('addfee')->find($id);

        $nama = $lokasi->name;
        $wa = $lokasi->wa;
        $kategori = $lokasi->panel->category;
        $barang = $lokasi->panel->type;
        $hargapermeter = $lokasi->panel ? 'Rp. ' . number_format($lokasi->panel->price, 0, ',', '.') : 'Rp. 0';
        $lengthwidth = intval($lokasi->length) . ' x ' . intval($lokasi->width) . ' Meter';
        $hargasementara = $lokasi->result ? 'Rp. ' . number_format($lokasi->result, 0, ',', '.') : 'Rp. 0';
        $provinsi = $lokasi->provinces->name;
        $kabupaten = $lokasi->regency;
        $transportasi = $lokasi->addfee->fee_transport ? 'Rp. ' . number_format($lokasi->addfee->fee_transport, 0, ',', '.') : '-';
        $pemasangan = $lokasi->addfee->fee_install ? 'Rp. ' . number_format($lokasi->addfee->fee_install, 0, ',', '.') : '-';
        $jasa = $lokasi->addfee->fee_service ? 'Rp. ' . number_format($lokasi->addfee->fee_service, 0, ',', '.') : '-';
        $service = $lokasi->addfee->fee_repair ? 'Rp. ' . number_format($lokasi->addfee->fee_repair, 0, ',', '.') : '-';
        $total = $lokasi->addfee->fee_total ? 'Rp. ' . number_format($lokasi->addfee->fee_total, 0, ',', '.') : '-';

        if (substr($wa, 0, 1) === '0') {
            $wa = '+62' . substr($wa, 1);
        }

        $message = "Detail Pesanan:\n\n"
            . "Nama: $nama\n"
            . "Kategori: $kategori\n"
            . "Jenis Barang: $barang\n"
            . "Harga Per Meter: $hargapermeter\n"
            . "Panjang x Lebar: $lengthwidth\n"
            . "Harga Sementara: $hargasementara\n\n"
            . "Provinsi: $provinsi\n"
            . "Kabupaten: $kabupaten\n"
            . "Biaya Transportasi: $transportasi\n"
            . "Biaya Pemasangan: $pemasangan\n"
            . "Biaya Jasa: $jasa\n"
            . "Biaya Service: $service\n"
            . "Total Biaya Keseluruhan: $total\n";

        $whatsappUrl = "https://web.whatsapp.com/send?phone=$wa&text=" . urlencode($message); // wa web
        //  $whatsappUrl = "whatsapp://send?phone=$wa&text=" . urlencode($message);//aplikasi wa

        return redirect($whatsappUrl);
    }

    public function destroy($id)
    {
        $lokasi = Orders::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Orders deleted successfully');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $status = Orders::find($id);
        $status->update(['status' => $request->status]);

        return back()->with('success', 'Status Updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Orders;
use App\Models\Panels;
use App\Models\Provinces;

use App\Models\Regencies;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdersController extends Controller
{
    public function index()
    {
        $order = Orders::with(['panel', 'provinces', 'regency', 'addfee'])->orderBy('created_at', 'desc')->get();
        return view('backend.orders.index', compact('order'));
    }

    public function create()
    {
        $panel = Panels::select('category')->distinct()->get();
        $provinces = Provinces::all();
        $regency = Regencies::all();
        return view('backend.orders.create', compact('panel', 'provinces', 'regency'));
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
            "wa" => "required|numeric",
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
        $order = Orders::with('addfee')->find($id);
        $panel = Panels::all();

        return view('backend.orders.edit', compact('panel', 'order'));
    }

    public function update(Request $request, Orders $order)
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

        $order->name = $request->input('name', $order->name);
        $order->wa = $request->input('wa', $order->wa);
        $order->category = $request->input('category', $order->category);
        $order->type = $request->input('type', $order->type);
        $order->length = $request->input('length', $order->length);
        $order->width = $request->input('width', $order->width);
        $order->province_id = $request->input('province_id', $order->province_id);
        $order->regency = $request->input('regency', $order->regency);
        $order->result = $request->input('result', $order->result);

        $order->save();

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil diperbarui');
    }

    public function show($id)
    {
        $order = Orders::with('addfee')->find($id);

        return view('backend.orders.show', compact('order'));
    }

    // Invoice teks direct ke WA
    public function sendInvoice($id)
    {
        $order = Orders::with('addfee')->find($id);

        $kode = $order->order_code;
        $nama = $order->name;
        $wa = $order->wa;
        $kategori = $order->panel->category;
        $barang = $order->panel->type;
        $hargapermeter = $order->panel ? 'Rp. ' . number_format($order->panel->price, 0, ',', '.') : 'Rp. 0';
        $lengthwidth = intval($order->length) . ' x ' . intval($order->width) . ' Meter';
        $hargasementara = $order->result ? 'Rp. ' . number_format($order->result, 0, ',', '.') : 'Rp. 0';
        $provinsi = $order->provinces->name;
        $kabupaten = $order->regency;
        $transportasi = $order->addfee->fee_transport ? 'Rp. ' . number_format($order->addfee->fee_transport, 0, ',', '.') : '-';
        $pemasangan = $order->addfee->fee_install ? 'Rp. ' . number_format($order->addfee->fee_install, 0, ',', '.') : '-';
        $jasa = $order->addfee->fee_service ? 'Rp. ' . number_format($order->addfee->fee_service, 0, ',', '.') : '-';
        $service = $order->addfee->fee_repair ? 'Rp. ' . number_format($order->addfee->fee_repair, 0, ',', '.') : '-';
        $total = $order->addfee->fee_total ? 'Rp. ' . number_format($order->addfee->fee_total, 0, ',', '.') : '-';

        if (substr($wa, 0, 1) === '0') {
            $wa = '+62' . substr($wa, 1);
        }

        $message = "Halo {$order->name}, ini detail pemesanan anda\n"
            . "Kode Pesanan = \" $kode \"\n\n"
            . "Nama\t\t\t\t: $nama\n"
            . "Provinsi\t\t\t\t: $provinsi\n"
            . "Kabupaten\t\t\t: $kabupaten\n"
            . "Kategori\t\t\t\t: $kategori\n"
            . "Jenis Barang\t\t\t: $barang\n"
            . "Harga Per Meter\t\t: $hargapermeter\n"
            . "Panjang x Lebar\t\t: $lengthwidth\n"
            . "Harga Sementara\t\t: $hargasementara\n\n"
            . "Biaya Tambahan antara lain\n"
            . "Biaya Transportasi\t\t: $transportasi\n"
            . "Biaya Pemasangan\t\t: $pemasangan\n"
            . "Biaya Jasa\t\t\t: $jasa\n"
            . "Biaya Service\t\t\t: $service\n\n"
            . "Total Biaya Keseluruhan\t: $total\n\n"
            . "💳 *Silakan melakukan DP/Pelunasan melalui nomor rekening berikut:* \n"
            . "_Bank ABC - 1234567890 a.n. W.N_ \n\n"
            . "Terima kasih telah bertransaksi dengan kami!";;

        $whatsappUrl = "https://web.whatsapp.com/send?phone=$wa&text=" . urlencode($message); // wa web
        //  $whatsappUrl = "whatsapp://send?phone=$wa&text=" . urlencode($message); // aplikasi wa

        return redirect($whatsappUrl);
    }

    // Invoice link PDF direct ke wa
    public function waInvoice($id)
    {
        $order = Orders::with(['addfee', 'panel'])->findOrFail($id);

        $imagePath = public_path('assets/images/Marco.png');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);

        $pdf = Pdf::loadView('invoices.invoice', compact('order', 'imageData', 'imageType'))->setPaper('A6', 'portrait');

        $filePath = storage_path('app/public/invoices/invoice_' . $order->id . '.pdf');
        $pdf->save($filePath);

        // Buat URL untuk unduhan PDF
        // $pdfUrl = asset('storage/invoices/invoice_' . $order->id . '.pdf'); // Asset
        $pdfUrl = url('storage/invoices/invoice_' . $order->id . '.pdf'); // URL

        $wa = $order->wa;
        if (substr($wa, 0, 1) === '0') {
            $wa = '+62' . substr($wa, 1);
        }

        $message = "Halo {$order->name},\n"
            . "Berikut adalah invoice pesanan Anda:\n\n"
            . "📄 Download PDF: $pdfUrl \n\n"
            . "💳 *Silakan melakukan DP/Pelunasan melalui nomor rekening berikut:* \n"
            . "_Bank ABC - 1234567890 a.n. W.N_ \n\n"
            . "Terima kasih telah bertransaksi dengan kami!";

        // Tautan WhatsApp
        $whatsappUrl = "https://web.whatsapp.com/send?phone=$wa&text=" . urlencode($message); // WA Web
        // $whatsappUrl = "whatsapp://send?phone=$wa&text=" . urlencode($message); // Apl WA

        return redirect($whatsappUrl);
    }

    public function printInvoice($id)
    {
        // Ambil data pesanan berdasarkan ID
        $order = Orders::findOrFail($id);

        $imagePath = public_path('assets/images/Marco.png');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);

        // Buat PDF dari view invoice
        $pdf = Pdf::loadView('invoices.invoice', compact('order', 'imageData', 'imageType'))->setPaper('A6', 'portrait');

        // Simpan PDF ke file sementara
        $filePath = storage_path('app/invoices/invoice_' . $order->id . '.pdf');
        $pdf->save(storage_path('app/invoices/invoice_' . $order->id . '.pdf'));

        return $pdf->stream('invoice_' . $order->id . '.pdf');
    }

    public function downloadInvoice($id)
    {
        // Ambil data pesanan berdasarkan ID
        $order = Orders::findOrFail($id);

        // Buat PDF dari view invoice
        $pdf = Pdf::loadView('invoices.invoice', compact('order'));

        // Download PDF
        return $pdf->download('invoice_' . $order->id . '.pdf');
    }

    public function checkOrder(Request $request)
    {
        $orderCode = $request->input('order_code');
        $order = Orders::where('order_code', $orderCode)->first();

        if ($order) {
            // Jika pesanan ditemukan, tampilkan detail pesanan
            return view('order.details', compact('order'));
        } else {
            // Jika tidak ditemukan, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors(['order_code' => 'Kode pemesanan tidak ditemukan.']);
        }
    }

    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $status = Orders::find($id);
        $status->update(['status' => $request->status]);
        $status->save();

        return back()->with('success', 'Status berhasil diperbarui');
    }

    // public function status(Request $request, $id)
    // {
    //     // Validasi input status
    //     $request->validate([
    //         'status' => 'required|string',
    //     ]);

    //     // Temukan pesanan berdasarkan ID
    //     $order = Orders::findOrFail($id);

    //     // Daftar status yang memerlukan biaya tambahan
    //     $restrictedStatuses = ['Approve', 'Finish'];

    //     $hasAdditionalFee = $order->addfee && $order->addfee->fee_total > 0;

    //     // Periksa apakah status baru memerlukan biaya tambahan, tetapi belum ada
    //     if (in_array($request->status, $restrictedStatuses) && !$hasAdditionalFee) {
    //         return back()->withErrors('Anda harus menambahkan biaya tambahan terlebih dahulu sebelum mengubah status menjadi "' . $request->status . '".');
    //     }

    //     // Update status jika validasi terpenuhi
    //     $order->update(['status' => $request->status]);

    //     return back()->with('success', 'Status berhasil diperbarui!');
    // }
}

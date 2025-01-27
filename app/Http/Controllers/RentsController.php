<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rents;
use App\Models\Panels;
use App\Models\Provinces;
use App\Models\Regencies;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RentsController extends Controller
{
    public function index()
    {
        $rent = Rents::with(['panel', 'provinces', 'regency'])->orderBy('created_at', 'desc')->get();
        return view('backend.rents.index', compact('rent'));
    }
    

    public function edit($id)
    {
        $rent = Rents::with('feerent')->find($id);
        $panel = Panels::all();

        return view('backend.rents.edit', compact('panel', 'rent'));
    }

    public function show($id)
    {
        $rent = Rents::with('feerent')->find($id);

        return view('backend.rents.show', compact('rent'));
    }

    public function destroy($id)
    {
        $rent = Rents::findOrFail($id);
        $rent->delete();

        return redirect()->route('rent.index')
            ->with('success', 'Pesanan berhasil dihapus');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $status = Rents::find($id);
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
    //     $rent = Rents::findOrFail($id);

    //     //  Daftar status yang memerlukan biaya tambahan
    //     $restrictedStatuses = ['Approve', 'Finish'];

    //     // Periksa apakah biaya tambahan sudah ada (jika ada fee_total)
    //     $hasAdditionalFee = $rent->feerent && $rent->feerent->fee_total > 0;

    //     // Periksa apakah status baru memerlukan biaya tambahan, tetapi belum ada
    //     if (in_array($request->status, $restrictedStatuses) && !$hasAdditionalFee) {
    //         return back()->withErrors('Anda harus menambahkan biaya tambahan terlebih dahulu sebelum mengubah status menjadi "' . $request->status . '".');
    //     }

    //     // Update status jika validasi terpenuhi
    //     $rent->update(['status' => $request->status]);

    //     return back()->with('success', 'Status berhasil diperbarui!');
    // }

    // Invoice teks direct ke WA
    public function sendInvoice($id)
    {
        $rent = Rents::with('feerent')->find($id);

        $kode = $rent->rent_code;
        $nama = $rent->nama;
        $wa = $rent->wa;
        $tgl = \Carbon\Carbon::parse($rent->tgl_sewa)->format('d-m-Y') . ' s/d ' .  Carbon::parse($rent->tgl_selesai)->format('d-m-Y');
        $jam = \Carbon\Carbon::parse($rent->mulai)->format('H:i') . ' s/d ' .  Carbon::parse($rent->selesai)->format('H:i');
        $kategori = $rent->panel->category;
        $barang = $rent->panel->type;
        $hargapermeter = $rent->panel ? 'Rp. ' . number_format($rent->panel->rental, 0, ',', '.') : 'Rp. 0';
        $lengthwidth = intval($rent->panjang) . ' x ' . intval($rent->lebar) . ' Meter';
        $hargasementara = $rent->total ? 'Rp. ' . number_format($rent->total, 0, ',', '.') : 'Rp. 0';
        $provinsi = $rent->provinces->name;
        $kabupaten = $rent->kabupaten;
        $keterangan = $rent->keterangan;
        $transportasi = $rent->feerent->fee_transport ? 'Rp. ' . number_format($rent->feerent->fee_transport, 0, ',', '.') : '-';
        $pemasangan = $rent->feerent->fee_install ? 'Rp. ' . number_format($rent->feerent->fee_install, 0, ',', '.') : '-';
        $jasa = $rent->feerent->fee_service ? 'Rp. ' . number_format($rent->feerent->fee_service, 0, ',', '.') : '-';
        $service = $rent->feerent->fee_repair ? 'Rp. ' . number_format($rent->feerent->fee_repair, 0, ',', '.') : '-';
        $support = $rent->feerent->fee_support ? 'Rp. ' . number_format($rent->feerent->fee_support, 0, ',', '.') : '-';
        $total = $rent->feerent->fee_total ? 'Rp. ' . number_format($rent->feerent->fee_total, 0, ',', '.') : '-';

        if (substr($wa, 0, 1) === '0') {
            $wa = '+62' . substr($wa, 1);
        }

        $message = "Halo {$rent->nama}, ini detail penyewaan anda\n"
            . "Kode Sewa = \" $kode \"\n\n"
            . "Nama\t\t\t\t: $nama\n"
            . "Tanggal\t\t\t\t: $tgl\n"
            . "Waktu\t\t\t\t: $jam\n"
            . "Provinsi\t\t\t\t: $provinsi\n"
            . "Kabupaten\t\t\t: $kabupaten\n"
            . "Kategori\t\t\t\t: $kategori\n"
            . "Jenis Barang\t\t\t: $barang\n"
            . "Harga Per Meter\t\t: $hargapermeter\n"
            . "Panjang x Lebar\t\t: $lengthwidth\n"
            . "Harga Sementara\t\t: $hargasementara\n\n"
            . "Keterangan\t\t\t: $keterangan\n\n"
            . "Biaya Tambahan antara lain\n"
            . "Biaya Transportasi\t\t: $transportasi\n"
            . "Biaya Pemasangan\t\t: $pemasangan\n"
            . "Biaya Jasa\t\t\t: $jasa\n"
            . "Biaya Service\t\t\t: $service\n"
            . "Biaya Pendukung\t\t: $support\n\n"
            . "Total Biaya Keseluruhan\t: $total\n\n"
            . "💳 *Silakan melakukan DP/Pelunasan melalui nomor rekening berikut:* \n"
            . "_Bank ABC - 1234567890 a.n. W.N_ \n\n"
            . "Terima kasih telah bertransaksi dengan kami!";

        $whatsappUrl = "https://web.whatsapp.com/send?phone=$wa&text=" . urlencode($message); // wa web
        //  $whatsappUrl = "whatsapp://send?phone=$wa&text=" . urlencode($message); // aplikasi wa

        return redirect($whatsappUrl);
    }

    // Invoice link PDF direct ke wa
    public function waInvoice($id)
    {
        $rent = Rents::with(['feerent', 'panel'])->findOrFail($id);

        $imagePath = public_path('assets/images/Marco.png');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);

        $pdf = Pdf::loadView('invoices.rental', compact('rent', 'imageData', 'imageType'))->setPaper('A6', 'portrait');

        $filePath = storage_path('app/public/invoices/rental_' . $rent->id . '.pdf');
        $pdf->save($filePath);

        // Buat URL untuk unduhan PDF
        // $pdfUrl = asset('storage/invoices/invoice_' . $rent->id . '.pdf'); // Asset
        $pdfUrl = url('storage/invoices/rental_' . $rent->id . '.pdf'); // URL

        $wa = $rent->wa;
        if (substr($wa, 0, 1) === '0') {
            $wa = '+62' . substr($wa, 1);
        }

        $message = "Halo {$rent->nama},\n"
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
        $rent = Rents::findOrFail($id);

        $imagePath = public_path('assets/images/Marco.png');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);

        // Buat PDF dari view invoice
        $pdf = Pdf::loadView('invoices.rental', compact('rent', 'imageData', 'imageType'))->setPaper('A6', 'portrait');

        // Simpan PDF ke file sementara
        $filePath = storage_path('app/invoices/rental_' . $rent->id . '.pdf');
        $pdf->save(storage_path('app/invoices/rental_' . $rent->id . '.pdf'));

        return $pdf->stream('rental_' . $rent->id . '.pdf');
    }
}

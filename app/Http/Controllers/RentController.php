<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rents;
use App\Models\Orders;
use App\Models\Panels;
use App\Models\Provinces;
use App\Models\Regencies;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RentController extends Controller
{
    public function create()
    {
        $provinces = Provinces::all();
        $panel = Panels::select('category')->whereNotNull('rental')->distinct()->get();;
        return view('rent', compact('provinces', 'panel'));
    }

    public function getRegencis(Request $request)
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

    public function getPanel($category_name)
    {
        $types = Panels::where('category', $category_name)->whereNotNull('rental')->get();
        return response()->json($types);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'wa' => 'required|string',
            'tgl_sewa' => 'required|date',
            'tgl_selesai' => 'required|date',
            'mulai' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i',
            'kabupaten' => 'required|string',
            'keterangan' => 'nullable|string',
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
            'genset' => 'sometimes|boolean', // Validasi checkbox
            'level' => 'required|numeric',
            'total' => 'required|numeric',
            'provinces_id' => 'required',
            'panel_id' => 'required',
        ]);

        $data['genset'] = $request->has('genset'); // Set ke true jika dicentang, false jika tidak
        $data['kabupaten'] = Regencies::find($request->input('kabupaten'))->name;
        $data['rent_code'] = 'REN-' . date('His') . '-' . rand(1, 99);
        $data['status'] = 'Prosses';

        // dd($data);
        // dd($request->all());

        $rent = Rents::create($data);

        session()->put('rent_code', $rent->rent_code);
        session()->flash('success', 'Pesanan telah berhasil dibuat dengan kode pemesanan: ' . $rent->rent_code);

        return redirect()->back();
        // return redirect()->route('order.details', ['type' => 'rent', 'code' => $rent->rent_code]);
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

    // public function checkOrder(Request $request)
    // {
    //     // Ambil kode dari input
    //     $code = $request->query('code');

    //     // Validasi input
    //     if (!$code) {
    //         return redirect()->back()->withErrors(['error' => 'Kode diperlukan.']);
    //     }

    //     // Cari kode di kedua tabel
    //     $order = Orders::with(['regency', 'provinces', 'addfee'])->where('order_code', $code)->first();
    //     $rent = Rents::with(['regency', 'provinces', 'feerent'])->where('rent_code', $code)->first();

    //     // Jika tidak ditemukan di kedua tabel
    //     if (!$order && !$rent) {
    //         return redirect()->back()->withErrors(['error' => 'Kode tidak ditemukan.']);
    //     }

    //     // Jika ditemukan, arahkan ke view yang sesuai
    //     return view('order.details', compact('order', 'rent'));
    // }
}

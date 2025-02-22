<?php

namespace App\Http\Controllers;

use App\Models\Rents;
use App\Models\Orders;
use App\Models\Panels;
use App\Models\Provinces;
use App\Models\Regencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $panel = Panels::select('category')->distinct()->get();
        $provinces = Provinces::all();
        return view('order', compact('panel', 'provinces'));
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
            "wa" => "required|numeric|digits_between:10,15",
            'regency' => "required|exists:regencies,id",
            "length" => "required|numeric",
            "width" => "required|numeric",
            "result" => "nullable|numeric",
            'provinces_id' => "required|exists:provinces,id",
            'panel_id' => "required|exists:panels,id",
        ], [
            'name.required' => 'Kolom Nama perlu diisi',
            'wa.required' => 'Kolom WhatsApp perlu diisi',
            'wa.numeric' => 'Kolom WhatsApp harus berupa angka',
            'wa.digits_between' => 'Nomor WhatsApp harus lebih dari 10 angka',
            'regency.required' => 'Kolom Kabupaten perlu diisi',
            'regency.exists' => 'Kabupaten tidak valid',
            'length.required' => 'Kolom Panjang perlu diisi',
            'length.numeric' => 'Kolom panjang harus berupa angka',
            'width.required' => 'Kolom Lebar perlu diisi',
            'width.numeric' => 'Kolom lebar harus berupa angka',
            'provinces_id.required' => 'Kolom Provinsi perlu diisi',
            'provinces_id.exists' => 'Provinsi tidak valid',
            'panel_id.required' => 'Kolom Panel perlu diisi',
            'panel_id.exists' => 'Panel tidak valid',
        ]);

        $regency = Regencies::find($request->input('regency'))->name;

        // Generate unique order code based on current timestamp
        $orderCode = 'ORD-' . date('His') . '-' . rand(1, 99);

        $order = Orders::create([
            "name" => $request->name,
            "wa" => $request->wa,
            "regency" => $regency,
            "length" => $request->length,
            "width" => $request->width,
            "result" => $request->result,
            "status" => 'Prosses',
            "provinces_id" => $request->provinces_id,
            "panel_id" => $request->panel_id,
            // "user_id" => $request->user_id,
            "order_code" => $orderCode,
        ]);

        session()->put('order_code', $order->order_code);

        session()->flash('success', 'Pesanan telah berhasil dibuat dengan kode pemesanan: ' . $orderCode);
        return redirect()->back();
        // return redirect()->route('order.details', ['type' => 'order', 'code' => $order->order_code]);
    }


    public function show($code)
    {
        // Deteksi tipe berdasarkan prefix kode
        if (str_starts_with($code, 'ORD-')) {
            $data = Orders::where('order_code', $code)->first();
            $type = 'order';
        } elseif (str_starts_with($code, 'REN-')) {
            $data = Rents::where('rent_code', $code)->first();
            $type = 'rent';
        } else {
            return redirect()->route('home')->with('error', 'Pesanan tidak ditemukan');
        }

        // Pastikan data ditemukan
        if (!$data) {
            return redirect()->route('home')->with('error', 'Pesanan tidak ditemukan');
        }

        return view('order.details', compact('data', 'type'));
    }


    public function checkOrder(Request $request)
    {
        // Ambil kode dari input
        $code = $request->query('code');

        // Validasi input
        if (!$code) {
            return redirect()->back()->withErrors(['error' => 'Kode diperlukan.']);
        }

        if (str_starts_with($code, 'ORD-')) {
            $data = Orders::where('order_code', $code)->first();
            $type = 'order';
        } elseif (str_starts_with($code, 'REN-')) {
            $data = Rents::where('rent_code', $code)->first();
            $type = 'rent';
        } else {
            return redirect()->route('home')->with('error', 'Pesanan tidak ditemukan');
        }

        // Pastikan data ditemukan
        if (!$data) {
            return redirect()->route('home')->with('error', 'Pesanan tidak ditemukan');
        }

        // Jika ditemukan, arahkan ke view yang sesuai
        // return view('order.details', compact('order', 'rent'));
        return view('order.details', compact('data', 'type'));
    }


    // public function show()
    // {
    //     $user = Auth::user(); // Dapatkan pengguna yang login
    //     $orders = Orders::where('user_id', $user->id)->orderBy('created_at', 'desc')->get(); // Ambil pesanan sesuai user_id

    //     return view('order.details', compact('orders', 'user'));
    // }
}

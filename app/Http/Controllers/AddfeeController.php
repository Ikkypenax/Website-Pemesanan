<?php

namespace App\Http\Controllers;

use App\Models\AddFee;
use App\Models\Orders;
use Illuminate\Http\Request;

class AddfeeController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            "transport" => "required|numeric",
            "install" => "required|numeric",
            "service" => "required|numeric",
            "repair" => "required|numeric",
            "order_id" => "required",
        ]);


        $order = Orders::findOrFail($request->order_id);

        $price = $order->result;

        $fee_total = $price + $request->transport + $request->install + $request->service + $request->repair;


        AddFee::create([
            "fee_transport" => $request->transport,
            "fee_install" => $request->install,
            "fee_service" => $request->service,
            "fee_repair" => $request->repair,
            "fee_total" => $fee_total,
            "order_id" => $request->order_id,
        ]);

        return redirect()->back()
            ->with('success', 'Biaya berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "transport" => "required|numeric",
            "install" => "required|numeric",
            "service" => "required|numeric",
            "repair" => "required|numeric",
            "order_id" => "required",
        ]);

        $order = Orders::findOrFail($request->order_id);

        $price = $order->result;

        $fee_total = $price + $request->transport + $request->install + $request->service + $request->repair;

        $fee = AddFee::where('order_id', $id)->firstOrFail();
        
        $fee->update([
            "fee_transport" => $request->transport,
            "fee_install" => $request->install,
            "fee_service" => $request->service,
            "fee_repair" => $request->repair,
            "fee_total" => $fee_total,
            "order_id" => $request->order_id,
        ]);

        return redirect()->back()
            ->with('success', 'Biaya berhasil diperbarui');
    }
}

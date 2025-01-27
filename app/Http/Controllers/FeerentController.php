<?php

namespace App\Http\Controllers;

use App\Models\Rents;
use App\Models\FeeRent;
use Illuminate\Http\Request;

class FeerentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "transport" => "required|numeric",
            "install" => "required|numeric",
            "service" => "required|numeric",
            "repair" => "required|numeric",
            "support" => "numeric",
            "rent_id" => "required",
        ]);

        $rent = Rents::findOrFail($request->rent_id);
        $rental = $rent->total;
        $fee_total = $rental + $request->transport + $request->install + $request->service + $request->repair + $request->support;

        FeeRent::create([
            "fee_transport" => $request->transport,
            "fee_install" => $request->install,
            "fee_service" => $request->service,
            "fee_repair" => $request->repair,
            "fee_support" => $request->support,
            "fee_total" => $fee_total,
            "rent_id" => $request->rent_id,
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
            "support" => "numeric",
            "rent_id" => "required",
        ]);

        $rent = Rents::findOrFail($request->rent_id);
        $rental = $rent->total;
        $fee_total = $rental + $request->transport + $request->install + $request->service + $request->repair + $request->support;

        $feerent = FeeRent::where('rent_id', $id)->firstOrFail();
        
        $feerent->update([
            "fee_transport" => $request->transport,
            "fee_install" => $request->install,
            "fee_service" => $request->service,
            "fee_repair" => $request->repair,
            "fee_support" => $request->support,
            "fee_total" => $fee_total,
            "rent_id" => $request->rent_id,
        ]);

        return redirect()->back()
            ->with('success', 'Biaya berhasil diperbarui');
    }
}

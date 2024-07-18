<?php

namespace App\Http\Controllers;

use App\Models\TambahRp;
use Illuminate\Http\Request;

class TambahRpController extends Controller
{
    public function edit($id)
    {
        $tambahRp = TambahRp::findOrFail($id);
        return view('tambah_rp.update', compact('tambahRp'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'biaya_transportasi' => 'required|numeric',
            'biaya_pemasangan' => 'required|numeric',
            'biaya_jasa' => 'required|numeric',
            'biaya_service' => 'required|numeric',
        ]);

        $tambahRp = TambahRp::findOrFail($id);


        $tambahRp->update([
            'biaya_transportasi' => $request->biaya_transportasi,
            'biaya_pemasangan' => $request->biaya_pemasangan,
            'biaya_jasa' => $request->biaya_jasa,
            'biaya_service' => $request->biaya_service,
        ]);


        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $tambahRp,
        ]);
    }
}

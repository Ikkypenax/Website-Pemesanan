<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $status = Pesanan::find($id);
        $status->update(['status' => $request->status]);
        return back()->with('success', 'Updated successfully.');
    }
}

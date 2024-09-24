<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Panels;
use App\Models\Provinces;
use App\Models\Regencies;
use Illuminate\Http\Request;

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


        session()->flash('success', 'Pesanan telah berhasil dibuat!');
        return redirect()->back(); 
    }
}

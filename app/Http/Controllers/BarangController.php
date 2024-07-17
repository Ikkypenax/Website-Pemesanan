<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HargaPerMeter;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = HargaPerMeter::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            
        ]);

        HargaPerMeter::create($request->all());
        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HargaPerMeter $barang )
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HargaPerMeter $barang)
    {
        $request->validate([
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HargaPerMeter $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil dihapus.');
    }
}

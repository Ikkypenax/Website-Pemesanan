<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\HargaPerMeter;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = HargaPerMeter::with('kategori')->get();
        $kategori = Kategori::all();
        return view('barang.index', compact('barang', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create', [
            'barang' => Kategori::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $kategori_id = Kategori::find($request->nama_kategori)->nama_kategori;

        $request->validate([
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',

        ]);

        HargaPerMeter::create([
            "jenis" => $request->jenis,
            "harga" => $request->harga,
            "kategori_id" => $request->kategori_id,

        ]);
        // dd($kategori_id);
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
    public function edit(HargaPerMeter $barang)
    {
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HargaPerMeter $barang)
    {
        $request->validate([
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
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

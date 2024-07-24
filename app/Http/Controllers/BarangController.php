<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\HargaPerMeter;

class BarangController extends Controller
{
    public function index()
    {
        $barang = HargaPerMeter::with('kategori')->get();
        $kategori = Kategori::all();
        return view('barang.index', compact('barang', 'kategori'));
    }

    public function create()
    {
        return view('barang.create', [
            'barang' => Kategori::get(),
        ]);
    }

    public function store(Request $request)
    {
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

    public function show(string $id)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(HargaPerMeter $barang)
    {
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

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

    public function destroy(HargaPerMeter $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}

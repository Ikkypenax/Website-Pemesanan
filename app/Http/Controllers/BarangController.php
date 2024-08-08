<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use App\Models\Kategori;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Panel::with('kategori')->get();
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

        Panel::create([
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

    public function edit(Panel $barang)
    {
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, Panel $barang)
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

    public function destroy(Panel $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}

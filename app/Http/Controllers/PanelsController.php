<?php

namespace App\Http\Controllers;

use App\Models\Panels;
use Illuminate\Http\Request;

class PanelsController extends Controller
{
    public function index()
    {
        $panel = Panels::all();
        return view('backend.panel.index', compact('panel'));
    }

    public function create()
    {
        $category = ['Indoor', 'Outdoor'];
        return view('backend.panel.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
        ], [
            'type.required' => 'Kolom jenis barang perlu diisi.',
            'price.required' => 'Kolom harga perlu diisi.',
            'category.required' => 'Kolom kategori perlu diisi.',
        ]);

        Panels::create([
            'type' => $request->type,
            'category' => $request->category,
            'price' => $request->price,
        ]);

        return redirect()->route('panel.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Panels $panel)
    {
        $category = ['Indoor', 'Outdoor'];
        return view('backend.panel.edit', compact('panel', 'category'));
    }

    public function update(Request $request, Panels $panel)
    {
        $request->validate([
            'type' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
        ], [
            'type.required' => 'Kolom jenis perlu diisi.',
            'category.required' => 'Kolom kategori perlu diisi.',
            'price.required' => 'Kolom harga perlu diisi.',
        ]);

        $panel->update($request->all());
        $panel->save();
        
        return redirect()->route('panel.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Panels $panel)
    {
        $panel->delete();
        return redirect()->route('panel.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}

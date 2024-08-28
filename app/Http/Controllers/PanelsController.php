<?php

namespace App\Http\Controllers;

use App\Models\Panels;
use Illuminate\Http\Request;

class PanelsController extends Controller
{
    public function index()
    {
        $panel = Panels::all();
        return view('panel.index', compact('panel'));
    }

    public function create()
    {
        $category = ['Indoor', 'Outdoor'];
        return view('panel.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
        ]);

        Panels::create([
            'type' => $request->type,
            'category' => $request->category,
            'price' => $request->price,
        ]);

        return redirect()->route('panel.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Panels $panel)
    {
        return view('panel.show', compact('panel'));
    }

    public function edit(Panels $panel)
    {
        $category = ['Indoor', 'Outdoor']; 
        return view('panel.edit', compact('panel', 'category'));
    }

    public function update(Request $request, Panels $panel)
    {
        $request->validate([
            'type' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
        ]);

        $panel->update($request->all());
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

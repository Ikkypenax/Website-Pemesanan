<?php

namespace App\Http\Controllers;


use App\Models\Katalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KatalogController extends Controller
{
    public function index()
    {
        $catalog = Katalog::all();

        return view('catalog.index', compact('catalog'));
    }
    public function list()
    {
        $catalog = Katalog::all();
        
        return view('catalog.list', compact('catalog'));
    }
    public function create()
    {
        return view('catalog.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $path = $data['nama'].'.'.$data['gambar']->getClientOriginalExtension();
        $data['gambar']->storeAs('public/images', $path);


        $catalog = new Katalog();
        $catalog->nama = $request->nama;
        $catalog->deskripsi = $request->deskripsi;
        $catalog->gambar = $path;
        $catalog->freshrate = $request->freshrate;

        $catalog->save();

        return redirect()->route('catalog.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {

        $catalog = Katalog::find($id);
        return view('catalog.edit', compact('catalog'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $data['nama'].'.'.$data['gambar']->getClientOriginalExtension();
        $data['gambar']->storeAs('public/images', $path);

        $catalog = Katalog::find($id);
        $catalog->nama = $request->nama;
        $catalog->deskripsi = $request->deskripsi;
        $catalog->gambar = $path;
        $catalog->freshrate = $request->freshrate;
        $catalog->save();

        return redirect()->route('catalog.index');
    }

    public function destroy($id)
    {
        $catalog = Katalog::find($id);
        $catalog->delete();

        return redirect()->route('catalog.index');
    }
}

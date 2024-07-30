<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Catalog::all();
        // dd($catalog);
        return view('catalog.index', compact('catalog'));
    }
    public function list()
    {
        $catalog = Catalog::all();
        // dd($catalog);
        return view('catalog.list', compact('catalog'));
    }
    public function create()
    {
        return view('catalog.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            // tambahkan validasi sesuai kebutuhan untuk deskripsi, harga, dll.
        ]);

        // dd($data['image']);

        // dd($data, $request->all());
        // path
        $path = $data['name'].'.'.$data['image']->getClientOriginalExtension(); // nama file
        $data['image']->storeAs('public/images', $path);

        // Simpan data produk ke dalam database
        $catalog = new Catalog();
        $catalog->name = $request->name;
        $catalog->description = $request->description;
        $catalog->image = $path; // Simpan nama file gambar ke dalam kolom 'image'
        $catalog->freshrate = $request->freshrate;
        // tambahkan kolom lainnya sesuai kebutuhan
        $catalog->save();

        return redirect()->route('catalog.index')->with('success', 'Produk berhasil ditambahkan');
    }


    // public function show($id)
    // {

    //     $catalog = Catalog::find($id);
    //     return view('catalog.show', compact('catalog'));
    // }

    public function edit($id)
    {

        $catalog = Catalog::find($id);
        return view('catalog.edit', compact('catalog'));
    }

    public function update(Request $request, $id)
    {
        $catalog = Catalog::find($id);
        $catalog->name = $request->name;
        $catalog->description = $request->description;
        $catalog->image = $request->image;
        $catalog->freshrate = $request->freshrate;
        $catalog->save();

        return redirect()->route('catalog.index');
    }

    public function destroy($id)
    {
        $catalog = Catalog::find($id);
        $catalog->delete();

        return redirect()->route('catalog.index');
    }
}

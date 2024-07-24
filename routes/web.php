<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\TambahRpController;
use App\Http\Controllers\BiayaLainController;



Route::resource('lokasi', LokasiController::class);
Route::put('/lokasi/{id}/status', [LokasiController::class, 'status'])->name('lokasi.status');

Route::resource('barang', BarangController::class);

Route::resource('biaya', BiayaLainController::class);



Route::get('/getJenis/{kategori_id}', [LokasiController::class, 'getJenis']);
Route::get('/getHarga/{jenis}', [LokasiController::class, 'getHarga']);

Route::get('/form', [WilayahController::class,'form'])->name('form');
Route::post('/getkabupaten', [WilayahController::class,'getkabupaten'])->name('getkabupaten');

Route::get('lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');



Route::get('/lokasi/nota', [LokasiController::class, 'nota'])->name('lokasi.nota');
// Route::post('/add-biaya-lain/{id}', [BiayaLainController::class, 'biaya'])->name('tambah-biaya-lain');






// Route::get('/getJenis/{kategori}', [LokasiController::class, 'getJenis']);
// Route::get('/barang/create', [BarangController::class, 'create']);
// Route::post('/barang/store', [BarangController::class, 'store']);

//Catalog
Route::get('/catalog', [CatalogController::class, 'index']);
Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::post('/catalog', [CatalogController::class, 'store'])->name('catalog.store');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{catalog}', [CatalogController::class, 'show'])->name('catalog.show');
Route::get('/catalog/{catalog}/edit', [CatalogController::class, 'edit'])->name('catalog.edit');
Route::delete('/catalog/{catalog}', [CatalogController::class, 'destroy'])->name('catalog.destroy');
Route::put('/catalog/{catalog}', [CatalogController::class, 'update'])->name('catalog.update');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\TambahRpController;

Route::resource('lokasi', LokasiController::class);

Route::resource('barang', BarangController::class);

Route::put('/lokasi/{id}/status', [LokasiController::class, 'status'])->name('lokasi.status');

Route::get('/getJenis/{kategori_id}', [LokasiController::class, 'getJenis']);
Route::get('/getHarga/{jenis}', [LokasiController::class, 'getHarga']);

Route::get('/form', [WilayahController::class,'form'])->name('form');
Route::post('/getkabupaten', [WilayahController::class,'getkabupaten'])->name('getkabupaten');

Route::resource('tambah_rp', TambahRpController::class);
Route::get('/lokasi/nota', [LokasiController::class, 'nota'])->name('lokasi.nota');

// Route::get('/getJenis/{kategori}', [LokasiController::class, 'getJenis']);
// Route::get('/barang/create', [BarangController::class, 'create']);
// Route::post('/barang/store', [BarangController::class, 'store']);
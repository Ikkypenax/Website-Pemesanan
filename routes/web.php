<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\BiayaLainController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role Admin
Route::group(['middleware' => ['auth']], function () {
    Route::resource('lokasi', LokasiController::class);
    Route::put('/lokasi/{id}/status', [LokasiController::class, 'status'])->name('lokasi.status');
    Route::get('lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    Route::get('lokasi/{id}/send-invoice', [LokasiController::class, 'sendInvoice'])->name('lokasi.sendInvoice');

    Route::resource('barang', BarangController::class);
    Route::put('biaya/{id}', [BarangController::class, 'update'])->name('biaya.update');
    Route::resource('biaya', BiayaLainController::class);
    Route::put('/biaya/{id}', [BiayaLainController::class, 'update'])->name('biaya.update');

    Route::get('/getJenis/{kategori_id}', [LokasiController::class, 'getJenis']);
    Route::get('/getHarga/{jenis}', [LokasiController::class, 'getHarga']);
    Route::post('/getkabupaten', [WilayahController::class, 'getkabupaten'])->name('getkabupaten');

    Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
    Route::post('/catalog', [CatalogController::class, 'store'])->name('catalog.store');
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/{catalog}/edit', [CatalogController::class, 'edit'])->name('catalog.edit');
    Route::delete('/catalog/{catalog}', [CatalogController::class, 'destroy'])->name('catalog.destroy');
    Route::put('/catalog/{catalog}', [CatalogController::class, 'update'])->name('catalog.update');
});

// Role User
Route::get('/form', [WilayahController::class, 'form'])->name('form');
Route::get('/catalog/list', [CatalogController::class, 'list'])->name('catalog.list');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::get('/getJenis/{kategori_id}', [OrderController::class, 'getJenis']);
Route::get('/getKabupaten/{id_provinsi}', [OrderController::class, 'getkabupaten']);
Route::get('/getHarga/{jenis}', [OrderController::class, 'getHarga']);
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

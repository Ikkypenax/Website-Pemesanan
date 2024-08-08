<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\BiayaLainController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PesananController;
// use App\Http\Controllers\LokasiController;
// use App\Http\Controllers\ListorderController;
// use App\Http\Controllers\CatalogController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about_us.index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role Admin
Route::group(['middleware' => ['auth']], function () {
    Route::resource('pesanan', PesananController::class);

    Route::put('/pesanan/{id}/status', [PesananController::class, 'status'])->name('lokasi.status');
    Route::get('pesanan/{id}/send-invoice', [PesananController::class, 'sendInvoice'])->name('lokasi.sendInvoice');
    
    Route::get('/getJenis/{kategori_id}', [PesananController::class, 'getJenis']);
    Route::get('/getHarga/{jenis}', [PesananController::class, 'getHarga']);
    Route::post('/getkabupaten', [PesananController::class, 'getkabupaten'])->name('getkabupaten');

    Route::resource('barang', BarangController::class);
    Route::put('biaya/{id}', [BarangController::class, 'update'])->name('biaya.update');
    Route::resource('biaya', BiayaLainController::class);
    Route::put('/biaya/{id}', [BiayaLainController::class, 'update'])->name('biaya.update');

    Route::get('/catalog/create', [KatalogController::class, 'create'])->name('catalog.create');
    Route::post('/catalog', [KatalogController::class, 'store'])->name('catalog.store');
    Route::get('/catalog', [KatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/{catalog}/edit', [KatalogController::class, 'edit'])->name('catalog.edit');
    Route::delete('/catalog/{catalog}', [KatalogController::class, 'destroy'])->name('catalog.destroy');
    Route::put('/catalog/{catalog}', [KatalogController::class, 'update'])->name('catalog.update');
});

// Role User
Route::get('/catalog/list', [KatalogController::class, 'list'])->name('catalog.list');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::get('/getJenis/{kategori_id}', [OrderController::class, 'getJenis']);
Route::get('/getKabupaten/{id_provinsi}', [OrderController::class, 'getkabupaten']);
Route::get('/getHarga/{jenis}', [OrderController::class, 'getHarga']);
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

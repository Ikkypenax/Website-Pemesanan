<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class BiayaLainController extends Controller
{
    public function biaya($id){
        $biayaTotal = Lokasi::select('result')->where('id', $id)->first();
        $x = 100;

        // simpan hasil form
        // 1 biaya transpor 
        // 2 biaya produksi dll

        // total semuanya 
        // $biayaTotal + 

        // create data di tambah_rp
    }   
}

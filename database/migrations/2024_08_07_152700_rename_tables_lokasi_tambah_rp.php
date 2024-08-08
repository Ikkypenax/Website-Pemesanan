<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTablesLokasiTambahRp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('lokasis', 'pesanan');
        Schema::rename('tambah_rp', 'tambah_biaya');
        Schema::rename('catalogs', 'katalog');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('pesanan', 'lokasis');
        Schema::rename('tambah_biaya', 'tambah_rp');
        Schema::rename('katalog', 'catalogs');
    }
}

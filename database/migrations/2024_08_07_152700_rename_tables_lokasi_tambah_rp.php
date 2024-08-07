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
        Schema::rename('lokasis', 'list_order');
        Schema::rename('tambah_rp', 'add_fee');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('list_order', 'lokasis');
        Schema::rename('add_fee', 'tambah_rp');
    }
}

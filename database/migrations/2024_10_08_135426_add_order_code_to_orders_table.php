<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_code')->unique()->after('id')->nullable(); // Pastikan kolom bisa nullable saat penambahan awal
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_code'); // Menghapus kolom jika migrasi dibatalkan
        });
    }
};

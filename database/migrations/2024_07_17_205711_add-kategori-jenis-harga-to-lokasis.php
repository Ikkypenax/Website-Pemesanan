<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lokasis', function (Blueprint $table) {
            // $table->string('kategori')->after('nama')->nullable();
            $table->string('jenis')->after('kategori')->nullable();
            // $table->decimal('harga', 15, 2)->after('lebar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lokasis', function (Blueprint $table) {
            // $table->dropColumn(['kategori', 'jenis', 'harga']);
            // $table->dropColumn([ 'jenis', 'harga']);
            $table->dropColumn([ 'jenis']);
        });
    }
};

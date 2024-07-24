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
        Schema::table('tambah_rp', function (Blueprint $table) {
            $table->decimal('total_biaya', 15, 2 )->after('biaya_service');
            // relasi to lokasis one to one
            $table->unsignedBigInteger('lokasi_id')->unique();
            $table->foreign('lokasi_id')->references('id')->on('lokasis')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tambah_rp', function (Blueprint $table) {
            $table->dropColumn('total_biaya');
            $table->dropForeign(['user_id']);
        });
    }
};

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
        Schema::create('tambah_rp', function (Blueprint $table) {
            $table->id();
            $table->decimal('biaya_transportasi', 15, 2);
            $table->decimal('biaya_pemasangan', 15, 2);
            $table->decimal('biaya_jasa', 15, 2);
            $table->decimal('biaya_service', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambah_rp');
    }
};

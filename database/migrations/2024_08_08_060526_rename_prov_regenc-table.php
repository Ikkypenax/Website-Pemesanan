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
        Schema::rename('provinces', 'provinsi');
        Schema::rename('regencies', 'kabupaten');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('provinsi', 'provinces');
        Schema::rename('kabupaten', 'regencies');
    }
};

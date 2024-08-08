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
        Schema::table('provinsi', function (Blueprint $table) {
            $table->renameColumn('name', 'nama');
        });

        Schema::table('kabupaten', function (Blueprint $table) {
            $table->renameColumn('province_id', 'provinsi_id');
            $table->renameColumn('name', 'nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('provinsi', function (Blueprint $table) {
            $table->renameColumn('nama', 'name');
        });

        Schema::table('kabupaten', function (Blueprint $table) {
            $table->renameColumn('provinsi_id', 'province_id');
            $table->renameColumn('nama', 'name');
        });
    }
};

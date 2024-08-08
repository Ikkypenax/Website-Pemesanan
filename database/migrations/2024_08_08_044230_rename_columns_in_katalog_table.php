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
        Schema::table('katalog', function (Blueprint $table) {
            $table->renameColumn('name', 'nama');
            $table->renameColumn('description', 'deskripsi');
            $table->renameColumn('image', 'gambar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('katalog', function (Blueprint $table) {
            $table->renameColumn('nama', 'name');
            $table->renameColumn('deskripsi', 'description');
            $table->renameColumn('gambar', 'image');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('lokasis', function (Blueprint $table) {
            $table->string('nama')->nullable();
            $table->string('wa')->nullable();
            $table->float('panjang')->nullable();
            $table->float('lebar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('lokasis', function (Blueprint $table) {
            $table->dropColumn(['nama', 'wa', 'panjang', 'lebar']);
        });
    }
};

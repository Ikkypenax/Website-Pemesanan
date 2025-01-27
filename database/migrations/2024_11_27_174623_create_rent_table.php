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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('wa');
            $table->date('tgl_sewa');
            $table->time('mulai');
            $table->time('selesai');
            $table->string('kabupaten');
            $table->text('keterangan')->nullable();
            $table->decimal('panjang', 15, 2);
            $table->decimal('lebar', 15, 2);
            $table->boolean('genset')->default(false);
            $table->decimal('level', 15, 2);
            $table->decimal('total', 15, 2);
            $table->char('provinces_id', 2);
            $table->bigInteger('panel_id')->unsigned()->nullable();


            $table->foreign('provinces_id')->references('id')
            ->on('provinces')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('panel_id')->references('id')
            ->on('panels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent');
    }
};

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
        Schema::create('fee_rent', function (Blueprint $table) {
            $table->id();
            $table->decimal('fee_transport', 15, 2)->nullable();
            $table->decimal('fee_install', 15, 2)->nullable();
            $table->decimal('fee_service', 15, 2)->nullable();
            $table->decimal('fee_repair', 15, 2)->nullable();
            $table->decimal('fee_support', 15, 2)->nullable();
            $table->decimal('fee_total', 15, 2);
            $table->bigInteger('rent_id')->unsigned();

            $table->foreign('rent_id')->references('id')
            ->on('rents')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_rent');
    }
};

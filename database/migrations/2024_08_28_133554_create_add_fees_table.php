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
        Schema::create('add_fee', function (Blueprint $table) {
            $table->id();
            $table->decimal('fee_transport', 15, 2);
            $table->decimal('fee_install', 15, 2);
            $table->decimal('fee_service', 15, 2);
            $table->decimal('fee_repair', 15, 2);
            $table->decimal('fee_total', 15, 2);
            $table->bigInteger('order_id')->unsigned();

            $table->foreign('order_id')->references('id')
            ->on('orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_fees');
    }
};

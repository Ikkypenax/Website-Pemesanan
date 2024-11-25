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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique()->nullable();
            $table->string('name');
            $table->string('wa');
            $table->string('regency');
            $table->decimal('length', 15, 2);
            $table->decimal('width', 15, 2);
            $table->decimal('result', 15, 2);
            $table->enum('status', ['Prosses', 'Approve', 'Reject', 'Finish']);
            $table->timestamps();
            $table->char('provinces_id', 2);
            $table->bigInteger('panel_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')
            ->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};

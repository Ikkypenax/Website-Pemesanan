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
        Schema::table('rents', function (Blueprint $table) {
            $table->string('rent_code')->after('updated_at')->unique()->nullable();
            $table->date('tgl_selesai')->after('tgl_sewa');
            $table->enum('status', ['Prosses', 'Approve', 'Reject', 'Finish'])->after('total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->dropColumn([ 'rent_code','tgl_selesai','status' ]);
        });
    }
};

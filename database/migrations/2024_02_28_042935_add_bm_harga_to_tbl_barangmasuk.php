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
        Schema::table('tbl_barangmasuk', function (Blueprint $table) {
            $table->string('bm_harga')->nullable();
            // $table->string('bm_')
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_barangmasuk', function (Blueprint $table) {
            //
        });
    }
};

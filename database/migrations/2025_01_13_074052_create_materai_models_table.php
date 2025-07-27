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
        Schema::create('tbl_materai', function (Blueprint $table) {

            $table->increments('id_materai');
            $table->string('mt_nama');
            $table->string('barang_kode');
            $table->string('mt_tanggal');
            $table->string('mt_stock');
            $table->string('mt_request');
            $table->string('mt_penggunaan');
            $table->timestamps();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_materai');
    }
};

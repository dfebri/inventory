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
        Schema::create('tbl_pesanan', function (Blueprint $table) {
            $table->increments('ps_id');
            $table->string('ps_kode');
            $table->string('barang_kode')->nullable();
            $table->string('ps_tanggal');
            $table->string('ps_barang')->nullable();
            $table->string('ps_nama');
            $table->string('ps_divisi');
            $table->string('ps_jumlah')->nullable();
            $table->string('ps_gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pesanan');
    }
};

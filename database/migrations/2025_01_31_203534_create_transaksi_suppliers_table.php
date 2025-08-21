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
        Schema::create('transaksi_suppliers', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_supplier');
            $table->unsignedBigInteger('id_produk');
            $table->decimal('harga_beli', 10, 2);
            $table->integer('jumlah');
            $table->dateTime('tanggal_transaksi');
            $table->foreign('id_supplier')->references('id_supplier')->on('suppliers');
            $table->foreign('id_produk')->references('id_produk')->on('produks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_suppliers');
    }
};

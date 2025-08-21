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
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id('id_ulasan'); // Primary key, auto increment
            $table->foreignId('id_produk')->constrained('produks', 'id_produk'); // Foreign key ke tabel produk
            $table->foreignId('id_user')->constrained('users', 'id_user'); // Foreign key ke tabel users
            $table->integer('rating')->default(0); // Rating produk
            $table->text('komentar')->nullable(); // Komentar ulasan
            $table->dateTime('tanggal_ulasan'); // Tanggal ulasan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};

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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // Primary Key
            $table->string('nama', 100); // Nama Pengguna
            $table->string('email', 100)->unique(); // Email Pengguna, Unik
            $table->string('password', 255); // Password Pengguna
            $table->text('alamat')->nullable(); // Alamat Pengguna
            $table->string('no_hp', 15)->nullable(); // Nomor Hp Pengguna
            $table->enum('role', ['admin', 'pelanggan', 'penjual']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

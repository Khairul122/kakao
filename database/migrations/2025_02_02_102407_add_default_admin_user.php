<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AddDefaultAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'nama' => 'Admin',
            'email' => 'admin@example.com', // Anda bisa mengganti email sesuai keinginan
            'password' => Hash::make('password'), // Encrypt password
            'role' => 'admin',
            'alamat' => null,
            'no_hp' => null
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('email', 'admin@example.com')->delete();
    }
}

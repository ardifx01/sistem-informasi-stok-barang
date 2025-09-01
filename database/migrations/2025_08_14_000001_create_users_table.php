<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                              // PK
            $table->string('nama');     
            $table->string('username')->unique();  // unik biar tak dobel
            $table->string('password');                // simpan HASH
            $table->string('role');         // role untuk antara admin atau user
            $table->rememberToken();                   // untuk "remember me"
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
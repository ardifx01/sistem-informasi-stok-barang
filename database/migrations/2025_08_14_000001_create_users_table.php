<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                                    // PK
            $table->string('nama');                          // Nama lengkap
            $table->string('username')->unique();            // Username unik
            $table->string('password');                      // HASH password
            $table->string('role');                          // Admin|Bendahara Pembantu|Penanggung Jawab
            $table->rememberToken();                         // "remember me"
            $table->timestamps();

            $table->index('role');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

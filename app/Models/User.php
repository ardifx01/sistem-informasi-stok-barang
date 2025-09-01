<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = ['nama', 'username', 'password', 'role'];

    // Sembunyikan saat serialized
    protected $hidden = ['password', 'remember_token'];

    // Laravel 10+: cast password supaya otomatis di-hash saat diisi string
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}

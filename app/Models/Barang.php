<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // nama tabel
    protected $fillable = ['nama_barang', 'jumlah', 'jenis_barang_id'];

    // Relasi ke JenisBarang
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }
}

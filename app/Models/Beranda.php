<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    /** @use HasFactory<\Database\Factories\BerandaFactory> */
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model (opsional)
    protected $table = 'berandas';

    // Tentukan kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'judul1', // untuk menyimpan judul section 1
        'deskripsi1', // untuk menyimpan deskripsi section 1
        'gambar1', // untuk menyimpan path gambar section 1
        'judul2', // untuk menyimpan judul section 2
        'deskripsi2', // untuk menyimpan deskripsi section 2
        'gambar2', // untuk menyimpan path gambar section 2
        'email', // untuk menyimpan email
        'alamat', // untuk menyimpan alamat
        'nomor', // untuk menyimpan nomor telepon
    ];

    // Tentukan kolom yang harus di-cast (misalnya untuk tipe data)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Mutator untuk mendapatkan path gambar1
    public function getGambar1Attribute($value)
    {
        return asset('storage/' . $value);
    }

    // Mutator untuk mendapatkan path gambar2
    public function getGambar2Attribute($value)
    {
        return asset('storage/' . $value);
    }
}

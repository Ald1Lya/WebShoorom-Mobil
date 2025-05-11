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
        'section', // nama section seperti hero, about, dll
        'judul', // untuk menyimpan judul tiap section
        'deskripsi', // untuk menyimpan deskripsi tiap section
        'gambar', // untuk menyimpan path gambar
    ];

    // Tentukan kolom yang harus di-cast (misalnya untuk tipe data)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

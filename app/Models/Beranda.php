<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Beranda.php
class Beranda extends Model
{
    protected $fillable = [
        'judul1', 'deskripsi1',
        'judul2', 'deskripsi2',
        'email', 'alamat', 'nomor',
        'judulsec3',
        'gambar1', 'gambar2', 'gambarsec3', 'gambarsec4', 'gambarsec5', 'gambarsec6'
    ];

    // Accessor supaya path gambar langsung lengkap
    public function getGambar1Attribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
    public function getGambar2Attribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
    public function getGambarsec3Attribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
    public function getGambarsec4Attribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
    public function getGambarsec5Attribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
    public function getGambarsec6Attribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}

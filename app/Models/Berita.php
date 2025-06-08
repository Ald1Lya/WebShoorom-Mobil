<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'video_url', 'image1', 'image2', 'text1', 'text2', 'highlights'];

    // Menambahkan casts untuk highlights agar Laravel otomatis mengubah JSON menjadi array
    protected $casts = [
        'highlights' => 'array',  // Ubah highlights menjadi array
    ];
}

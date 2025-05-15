<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merek;  // Pastikan ini ada

class Katalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'harga', 'tahun', 'transmisi', 'bahan_bakar',
        'kilometer', 'deskripsi', 'status', 'foto_utama','foto1','foto2','foto3','merek_id'
    ];

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }
}

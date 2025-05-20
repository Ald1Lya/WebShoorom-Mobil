<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Katalog;

class Pembelian extends Model
{
    protected $fillable = [
        'katalog_id',
        'user_id',
        'nama',
        'email',
        'no_telepon',
        'alamat',
        'metode_pembayaran',
        'nomor_order',
        'tanggal_pembelian',
    ];

    public function katalog()
    {
        return $this->belongsTo(Katalog::class);
    }
        public function user()
    {
        return $this->belongsTo(UserLogin::class, 'user_id');
    }
}


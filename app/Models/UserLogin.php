<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserLogin extends Model
{
    protected $table = 'user_logins';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;

    /**
     * Menyimpan data ke dalam database, termasuk enkripsi password
     */
  
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makelar extends Model
{
    protected $fillable = ['nama', 'no_wa'];

    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'event_time',
        'location',
        'image_url',
    ];

    // Kalau kamu pakai tipe date di database dan ingin parsing otomatis:
    protected $dates = ['event_date'];

    // Opsional: format date otomatis kalau dipanggil
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->event_date)->format('F j, Y');
    }

    public function getFormattedTimeAttribute()
    {
        return Carbon::parse($this->event_time)->format('H:i');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Device;


class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'suhu',
        'ph',
        'DO',
        'ultrasonic',
        'nilaiKeruh',
        'TDS',
        'konduktifitas',
        'panjang',
        'lebar',
        'volume',
        'device_id',
    ];

    public function devices()
    {
        $this->belongsTo(Device::class);
    }
}

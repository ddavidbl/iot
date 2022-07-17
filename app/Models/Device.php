<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'lat',
        'lng',
        'lokasi',
        'panjang',
        'lebar',
        'volume',
    ];

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
    // public function area()
    // {
    //     return $this->belongsTo(Area::class);
    // }
}

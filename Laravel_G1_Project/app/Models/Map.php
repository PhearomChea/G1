<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'drone_id',
        'farm_id'
    ];

    public function drone() {
        return $this->belongsTo(Drone::class);
    }

    public function farm() {
        return $this->belongsTo(Farm::class);
    }
}

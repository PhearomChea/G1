<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'speed',
        'height',
        'drone_running',
        'plan_id',
        'drone_id'
    ];

    public function plan() {
        return $this->belongsTo(Plan::class);
    }

    public function drone() {
        return $this->belongsTo(Drone::class);
    }
}

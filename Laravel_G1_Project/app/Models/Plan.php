<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_name',
        'date_time', 
        'user_id',
        'farm_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function farm() {
        return $this->belongsTo(Farm::class);
    }
    
    public function instruction() {
        return $this->hasMany(Instruction::class);
    }
}

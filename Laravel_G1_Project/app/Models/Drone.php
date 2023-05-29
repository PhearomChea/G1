<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\location;
class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'drone_id', 
        'type_of_drone',
        'battery', 
        'payload_capacity',
        'date_time', 
        'location_id'
    ];

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function instruction() {
        return $this->hasMany(Instruction::class);
    }
}

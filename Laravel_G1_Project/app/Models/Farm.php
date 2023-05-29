<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'user_id',
        'province_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function province() {
        return $this->belongsTo(Province::class);
    }
}

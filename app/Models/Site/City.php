<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function obyektlar()
    {
        return $this->hasMany(Obyekt::class);
    }

}

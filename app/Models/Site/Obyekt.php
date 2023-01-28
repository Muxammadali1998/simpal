<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obyekt extends Model
{
    use HasFactory;

    public function city(){
       return $this->belongsTo(City::class);
    }
}

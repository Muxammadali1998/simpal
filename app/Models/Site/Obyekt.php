<?php

namespace App\Models\Site;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obyekt extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'name',
        'phone',
        'work',
        'on',
    ];

    public function city(){
       return $this->belongsTo(City::class);
    }
}

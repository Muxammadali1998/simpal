<?php

namespace App\Models\Site;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Broadcast;


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
    Broadcast::channel('orders.{order}', function () {
        return true;
    });
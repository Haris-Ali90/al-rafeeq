<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteHistory extends Model
{
    use HasFactory;

    public $table = 'route_history';

    public function getJoey()
    {
        return $this->hasOne(Joey::class,'id','joey_id');
    }


}

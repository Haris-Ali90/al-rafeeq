<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoeyRouteLocation extends Model
{
    use HasFactory;

    public $table = 'joey_route_locations';
 /**
  * get joey route details
  */
    public function joeyRouteDetail()
    {
        return $this->hasOne(JoeyRoute::class,'id','route_id')->orderBy('id','desc');
    }
    public function routeHistory()
    {
        return $this->hasMany(RouteHistory::class,'route_location_id','id')->whereNull('deleted_at')->orderBy('created_at','desc');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $table = 'locations';


    /**
     * get city table details
     */
    public function cityDetail()
    {
        return $this->hasOne(City::class,'id','city_id');
    }
}

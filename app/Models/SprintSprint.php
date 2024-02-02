<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprintSprint extends Model
{
    use HasFactory;
    public $table = 'sprint__sprints';

    /**
     * get joey info
     */
    public function joeyInfo()
    {
        return $this->hasOne(Joey::class,'id','joey_id');
    }

    /**
     * get Vendor info
     */
    public function vendorInfo()
    {
        return $this->hasOne(Vendor::class,'id','creator_id');
    }
}

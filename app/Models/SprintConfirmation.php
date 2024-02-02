<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprintConfirmation extends Model
{
    use HasFactory;
    public $table = 'sprint__confirmations';


/**
 * get joey info
 */
    public function joeyInfo()
    {
        return $this->hasOne(Joey::class,'id','joey_id');
    }
}

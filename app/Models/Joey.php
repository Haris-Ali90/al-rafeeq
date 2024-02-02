<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joey extends Model
{
    use HasFactory;
    public $table = 'joeys';

    /**
     * get joey location
     */
    public function joeyLocationDetail()
    {
        return $this->hasOne(JoeyLocation::class,'joey_id','id');
    }

}

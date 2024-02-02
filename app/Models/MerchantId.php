<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MerchantId extends Model
{
    use HasFactory;
    public $table = 'merchantids';

    /**
     *get sprint confirmation table details
     */
    public function sprintConfirmationDetail()
    {
        return $this->hasOne(SprintConfirmation::class,'task_id','task_id')->orderBy('id','desc');
    }
    /**
     *get Joey route location table details
     */
    public function joeyRouteLocationDetail()
    {
        return $this->hasOne(JoeyRouteLocation::class,'task_id','task_id')->orderBy('id','desc');
    }
     /**
     *get sprint task table details
     */
    public function sprintTaskDetail()
    {
        return $this->hasOne(SprintTask::class,'id','task_id')->whereNull('deleted_at');
    }

}

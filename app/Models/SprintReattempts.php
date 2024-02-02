<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SprintReattempts extends Model
{
    use HasFactory;
    public $table='sprint_reattempts';

    /**
     *get sprint  table details
     */
    public function sprintDetails()
    {
        return $this->belongsTo(SprintSprint::class,'reattempt_of','id'); //(relation class,FK,PK)
    }

/**
     *get sprint task table details
     */
    public function sprintTaskDetails()
    {
        return $this->hasOne(SprintTask::class,'sprint_id','reattempt_of'); //(relation class,PK,FK)
    }
/**
     *get sprint history table details
     */

    public function sprintTaskHistoryDetails()
    {
        return $this->hasMany(SprintTasksHistory::class,'sprint_id','reattempt_of')
        ->select(DB::raw('status_id, max(created_at) as created_at'))
                    ->whereNotIn('status_id',[38,17])
                    ->groupBy('status_id')
                    ->orderBy('created_at','ASC')
                    ; //(relation class,PK,FK)
    }
/**
     *get reattempt details from current table
     */
    public function getReattempt()
    {
        return $this->hasOne($this,'sprint_id','reattempt_of');
    }
}

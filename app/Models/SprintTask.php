<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SprintTask extends Model
{
    use HasFactory;

    public $table = 'sprint__tasks';

    /**
     * get Location details
     */
    public function locationDetail()
    {
        return $this->hasOne(Location::class,'id','location_id');
    }
    /**
     * get sprint task history details
     */
    public function sprintTaskHistoryDetail()
    {
        return $this->hasMany(SprintTasksHistory::class,'sprint_id','sprint_id')
        ->whereNotIn('status_id',[38,36])->orderBy('created_at');
    }

    /**
     * get sprint task history details
     */
    public function sprintTaskHistoryDetailData()
    {
        return $this->hasMany(SprintTasksHistory::class,'sprint_id','sprint_id')
        ->whereNotIn('status_id',[38,17])->orderBy('created_at');
    }
     /**
     * get sprint details
     */
    public function sprintDetail()
    {
        return $this->hasOne(SprintSprint::class,'id','sprint_id');
    }
     /**
     * get sprint reatempt details
     */
    public function sprintReattemptDetail()
    {
        return $this->hasOne(SprintReattempts::class,'sprint_id','sprint_id');
    }

    public function sprintTaskHistoryDetails()
    {
        return $this->hasMany(SprintTasksHistory::class,'sprint_id','sprint_id')
            ->select(DB::raw('status_id, max(created_at) as created_at'))
            ->whereNotIn('status_id',[38,17])
            ->groupBy('status_id')
            ->orderBy('created_at','ASC')
            ; //(relation class,PK,FK)
    }
    /**
     *get sprint confirmation table details
     */
    public function sprintConfirmationDetail()
    {
        return $this->hasOne(SprintConfirmation::class, 'task_id', 'location_id')->orderBy('id', 'desc');
    }

    /*For getting Contact Data*/
    public function contact_details()
    {
        return $this->belongsTo(SprintContact::class,'contact_id','id')->whereNull('deleted_at');


    }
}

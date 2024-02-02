<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MicroHubRequest extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'micro_hub_request';
    protected $guarded = [];

}

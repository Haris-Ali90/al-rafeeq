<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	public $timestamps = false;
    use HasFactory;
    public $table = 'cities';

    protected $guarded = [];
}
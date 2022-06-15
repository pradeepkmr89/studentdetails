<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlanHistry extends Model
{
    use HasFactory;

    protected $table = 'user_plan_histries';
     
    protected $guarded = [];  
    public $timestamps = false;
}

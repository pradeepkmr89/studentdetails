<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileMaster extends Model
{
    use HasFactory;

    protected $table = 'user_profile_master';
     
    protected $guarded = [];  
    public $timestamps = false;
}

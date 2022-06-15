<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumLikeMaster extends Model
{
    use HasFactory;

    protected $table = 'forum_like_master';
     
    protected $guarded = [];  
    public $timestamps = false;
}

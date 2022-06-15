<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPostSave extends Model
{
    use HasFactory;

    protected $table = 'forum_post_save';
     
    protected $guarded = [];  
    public $timestamps = false;
    
    public function forumpost()
    {
        return $this->belongsTo('App\Models\ForumPost','id');
    }
}
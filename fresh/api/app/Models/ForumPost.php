<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $table = 'forum_post';
     
    protected $guarded = [];  
    public $timestamps = false;
    
    
    public function likes()
    {
        return $this->hasMany('App\Models\ForumLikeMaster','forum_post_id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\ForumCommentMaster','forum_post_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\ForumCategory');
    }
}

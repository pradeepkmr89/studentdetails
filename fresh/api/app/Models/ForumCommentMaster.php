<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumCommentMaster extends Model
{
    use HasFactory;

    protected $table = 'forum_comment_master';
     
    protected $guarded = [];  
    public $timestamps = false;
    
    
    public function commentreply()
    {
        return $this->hasMany('App\Models\ForumCommentReply','forum_comment_master_id');
    }
    
}
?>
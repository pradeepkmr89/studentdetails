<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumCommentReply extends Model
{
    use HasFactory;

    protected $table = 'forum_comment_reply';
     
    protected $guarded = [];  
    public $timestamps = false;
    
    
}
?>
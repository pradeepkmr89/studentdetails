<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    use HasFactory;

    protected $table = 'report_users';
     
    protected $guarded = [];  
    public $timestamps = false;
    
    //reported_by User 
    public function reported_by()
    {
        return $this->belongsTo('App\Models\User','reported_by','id');
    }
    
    //reported to User 
    public function ruser()
    {
        return $this->belongsTo('App\Models\User','report_user_id','id');
    }
}

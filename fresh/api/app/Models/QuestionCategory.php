<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;

    protected $table = 'question_category';
     
    protected $guarded = [];  
    public $timestamps = false;
     
    
    public function subCategory()
    {
        return $this->hasMany('App\Models\QuestionCategory', 'parent_id');
    }
}
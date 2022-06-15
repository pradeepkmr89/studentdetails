<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
     
    protected $guarded = [];  
    public $timestamps = false;
     
    public function category()
    {
    return $this->belongsTo('App\Models\QuestionCategory','category_id','id');
    }
    public function subcategory()
    {
    return $this->belongsTo('App\Models\QuestionCategory','sub_category_id','id');
    }
    public function subsubcategory()
    {
    return $this->belongsTo('App\Models\QuestionCategory','sub_sub_category_id','id');
    }
}
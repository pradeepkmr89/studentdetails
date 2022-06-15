<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\ReportUser;
use App\Models\User;
use App\Models\ForumCategory;
use App\Models\UserPlanHistry;
use App\Models\Content;
use App\Models\ForumPost;
use App\Models\QuestionCategory;
use App\Models\Question;
use App\Models\UserAnswer;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Auth;

class QuestionApiController extends Controller
{
    public function get_question(Request $request){
        $res = Question::all();
        return response()->json([
                "status" => "true",
                "message" => "success",
                "data" => $res
            ],200);
    }
    
    public function submit_answer(Request $request){
     $data = [];
		$validator = Validator::make(
			$request->all(),
			[
				"user_id" => "integer",
				"json_response" => "required",
			]
		);

		if ($validator->fails()) {
			$response = [
				"success" => false,
				"message" => $validator->messages(),
			];
			return response()->json($response, 401);
		}   
		$request['user_id'] = Auth::user()->id;
		$json_decode = json_decode($request->json_response);
		$CatAnsArr = [];
		$category_ids= [];
		$subcategory_ids= [];
		$subtotal= '';
		foreach($json_decode as $keys=>$val){
		  
		  //find category id from Question
		  $queryQues = Question::where('id',$val->question_id)->first();
		  if($queryQues->category_id!=''){
		      $category_id = $queryQues->category_id; 
		   if(in_array($category_id, $category_ids)){
		    $totans += $val->answer;
  		    $total[$category_id] = $totans; 
 		    $count[$category_id]++; 
		   }else{
    		  $totans = $val->answer;
     		  $category_ids[] = $queryQues->category_id;
     		  $total[$category_id] = $totans; 
     		  $count[$category_id] = 1;
		   }
 		  
		  } 
		 //find Sub category id from Question
		   if($queryQues->sub_category_id!=''){ 
		  $subcategory_id = $queryQues->sub_category_id; 
		   if(in_array($subcategory_id, $subcategory_ids)){
		    $subtotans += $val->answer;
  		    $total[$subcategory_id] = $subtotans; 
  		    $count[$subcategory_id]++;
		   }else{
    		  $subtotans = $val->answer;
     		  $subcategory_ids[] = $queryQues->sub_category_id;
     		  $total[$subcategory_id] = $subtotans; 
     		  $count[$subcategory_id] = 1;
		   }
 		  } 
		}
 
		$cateWiseTotal =  json_encode($total);
		$SubcateWiseTotal = json_encode($subtotal);
		$categoryCount = json_encode($count);
		
 		//$listOfCategory = implode(',',$category_ids);
		//$listOfSubCategory = implode(',',$subcategory_ids);
	  
		$userid = Auth::user()->id;
		
		$UserAnswer = UserAnswer::firstOrNew(['user_id' =>  $userid]); 
		
        $UserAnswer->user_id = $userid;
        $UserAnswer->json_response = $request->json_response;
        $UserAnswer->category_id_total = $cateWiseTotal;
        $UserAnswer->subcategory_id_total = $SubcateWiseTotal;
        $UserAnswer->category_count = $categoryCount;
        
       $res = $UserAnswer->save(); 
		if($res){
		 return response()->json([
                "status" => "true",
                "message" => "success",
                "data" => $data
            ],200);
		}else{
		 return response()->json([
                "status" => "false",
                "message" => "Something went wrong",
                "data" => $data
            ],200);   
		}
    } 
    public function match_compatibility(Request $request){
        $userid = Auth::user()->id;
        $matchUser = $request->user_id;
        $PercentageRange = array(0 => 100, 1 => 80, 2 => 60, 3 => 40, 4 => 20, 5 => 0);
        
        $qry1 = UserAnswer::where('user_id',$userid)->first();
        $qry2 = UserAnswer::where('user_id',$matchUser)->first(); 
        
        $userans1 = json_decode($qry1->json_response); 
        $userans2 = json_decode($qry2->json_response,true); 
        //MPD(21) = 10%, Big5(22) = 60%, mcgill(20) = 30%
        $catmpd = '21';
        $catbig5 = '22';
        $catmcgill = '20';
        $catlyf = '1';
        $sr = 0;
        $QuestionAnswerScore_ForMcGill = [];
        $QuestionAnswerScore_ForMPD = [];
        $QuestionAnswerScore_ForBig5 = [];
        $QuestionAnswerScore_ForLyf = [];
        $Big5WeightagePercentage = 0;
        $McGillWeightagePercentage = 0;
        $MPDWeightagePercentage = 0;
        $LYFWeightagePercentage = 0;

        foreach($userans1 as $key=>$value){ 
            
             $queryQues = Question::where('id',$value->question_id)->first();
              
             if($queryQues->category_id!=''){
		      $category_id = $queryQues->category_id; 
             }
             if($queryQues->sub_category_id!=''){ 
                $subcategory_id = $queryQues->sub_category_id; 
             }
               $answer = $value->answer;
               
              if ($catmpd==$subcategory_id) {
                $QuestionAnswerScore_ForMcGill[] = $PercentageRange[abs($answer - $userans2[$key]['answer'])];
            }
            if ($catmcgill==$subcategory_id) {
                $QuestionAnswerScore_ForMPD[] = $PercentageRange[round(($answer + $userans2[$key]['answer']) / 2)];
            }
            if ($catbig5==$subcategory_id) {
                $QuestionAnswerScore_ForBig5[] = $PercentageRange[round(($answer + $userans2[$key]['answer']) / 2)];
            } 
            
            if ($catlyf==$category_id) {
                $QuestionAnswerScore_ForLyf[] = $PercentageRange[round(($answer + $userans2[$key]['answer']) / 2)];
            } 
            
          $sr++;  
        }
        if(count($QuestionAnswerScore_ForMcGill)){
         $Big5WeightagePercentage = (array_sum($QuestionAnswerScore_ForMcGill) / count($QuestionAnswerScore_ForMcGill) * 36) / 100;
        }
         if(count($QuestionAnswerScore_ForMPD)){
            $McGillWeightagePercentage = (array_sum($QuestionAnswerScore_ForMPD) / count($QuestionAnswerScore_ForMPD) * 18) / 100;
         }
          if(count($QuestionAnswerScore_ForBig5)){
            $MPDWeightagePercentage = (array_sum($QuestionAnswerScore_ForBig5) / count($QuestionAnswerScore_ForBig5) * 6) / 100;
          }
          if(count($QuestionAnswerScore_ForLyf)){
            $LYFWeightagePercentage = (array_sum($QuestionAnswerScore_ForLyf) / count($QuestionAnswerScore_ForLyf) * 40) / 100;
          }
             $TotalMatchPercentage = round($McGillWeightagePercentage) + round($Big5WeightagePercentage) + round($MPDWeightagePercentage) + round($LYFWeightagePercentage);
    
         return response()->json([
                "status" => "true",
                "message" => $TotalMatchPercentage."% matched",
                "data" => $TotalMatchPercentage
            ],200);
            
        
        
    }
    public function getcategory($id){
         
         $parentids = [];
        
        $catid = QuestionCategory::where('id',$id)->get();
        $parentid = $catid[0]->parent_id;
        $parentids[] = $parentid;
    
         while($parentid>0){
         $parentidArr = QuestionCategory::where('id',$parentid)->get();
         $parentids[] = $parentidArr[0]->parent_id;
         $parentid = $parentidArr[0]->parent_id; 
        }
        $final = array("category_id"=>$id,"parent_id"=>$parentids);
        $res = json_encode($final);
         return $res;
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfileMaster;
use App\Models\UserEducation;
use App\Models\User;
use App\Models\ReportUser;
use App\Models\Content;
use App\Models\Plan;
use App\Models\UserPlanHistry;
use App\Models\FilterSetting;
use App\Models\ForumCategory;
use App\Models\ForumPost;
use App\Models\ForumLikeMaster;
use App\Models\ForumCommentMaster;
use App\Models\ForumCommentReply;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;

class DetailsApiController extends Controller
{
    //Report User

	public function report_user(Request $request)
	{
		$data = [];
		$validator = Validator::make(
			$request->all(),
			[
				"report_user_id" => "required|integer|exists:users,id",
				"reason" => "required|string",
			]
		);

		if ($validator->fails()) {
			$response = [
				"success" => false,
				"message" => $validator->messages(),
			];
			return response()->json($response, 401);
		}

		$userid = Auth::user()->id;
		$request["reported_by"] = $userid;
		try {
			$data = ReportUser::create($request->all());
			if ($data) {
				$response = [
					"success" => true,
					"message" => "Added successfully",
					"data" => $data,
				];
				return response()->json($response, 200);
			} else {
				$response = [
					"success" => false,
					"message" => "something went wrong",
				];
				return response()->json($response);
			}
		} catch (ModelNotFoundException $e) {
			$response = [
				"success" => false,
				"message" => "something went wrong",
			];
			return response()->json($response);
		}
	}

 
	public function checkfieldexist(Request $request)
	{
	   if($request->check == 'email'){
	       if (User::where('email', $request->email)->exists()) {
              	$response = [
    			"success" => true,
    			"message" => "exist",
     		    ];
		    return response()->json($response, 200);
            }
        	$response = [
			"success" => true,
			"message" => "Not exist",
 		    ];
	    return response()->json($response, 200);
	        
	   }else{
	       if (User::where('user_phone', $request->user_phone)->exists()) {
              	$response = [
    			"success" => true,
    			"message" => "exist",
     		    ];
		    return response()->json($response, 200);
            }
        	$response = [
			"success" => true,
			"message" => "Not exist",
 		    ];
	    return response()->json($response, 200);
	   }
	    
	 }//CMS Pages

	public function content(Request $request)
	{
		$data = [];
		$validator = Validator::make(
			$request->all(),
			[
				"page_id" => "required|integer",
			]
		);

		if ($validator->fails()) {
			$response = [
				"success" => false,
				"message" => $validator->messages(),
			];
			return response()->json($response, 401);
		}

		$data = Content::find($request->page_id);

		$response = [
			"success" => true,
			"message" => "success",
			"data" => $data,
		];
		return response()->json($response, 200);
	}

	public function filter_setting(Request $request)
	{
		$data = [];
		$validator = Validator::make(
			$request->all(),
			[
				"location" => "string",
				"gender" => "string",
			]
		);

		if ($validator->fails()) {
			$response = [
				"success" => false,
				"message" => $validator->messages(),
			];
			return response()->json($response, 401);
		}
		$userid = Auth::user()->id;
		try {
			$FilterSetting = FilterSetting::firstOrNew(["user_id" => $userid]);
			$FilterSetting->user_id = $userid;
			$FilterSetting->location = $request->location;
			$FilterSetting->budget_min = $request->budget_min;
			$FilterSetting->budget_max = $request->budget_max;
			$FilterSetting->gender = $request->gender;
			$FilterSetting->age_min = $request->age_min;
			$FilterSetting->age_max = $request->age_max;
			$FilterSetting->current_location = $request->current_location;
			$FilterSetting->target_location = $request->target_location;
			$FilterSetting->smoke = $request->smoke;
			$FilterSetting->drugs = $request->drugs;
			$FilterSetting->drinking = $request->drinking;
			$FilterSetting->pets = $request->pets;

			$FilterSetting->save();

			$response = [
				"success" => true,
				"message" => "Save successfully",
				"data" => $data,
			];
			return response()->json($response, 200);
		} catch (ModelNotFoundException $e) {
			$response = [
				"success" => false,
				"message" => "something went wrong",
			];
			return response()->json($response);
		}
	}

	public function get_plan()
	{
		$data = Plan::all();
		$response = [
			"success" => true,
			"message" => "success",
			"data" => $data,
		];
		return response()->json($response, 200);
	}
	public function subscription(Request $request)
	{
		$data = [];
		$validator = Validator::make(
			$request->all(),
			[
				"plan_id" => "string",
				"amount" => " required|regex:/^\d+(\.\d{1,2})?$/",
				"valid_days_for" => "integer",
			]
		);

		if ($validator->fails()) {
			$response = [
				"success" => false,
				"message" => $validator->messages(),
			];
			return response()->json($response, 401);
		}
		$userid = Auth::user()->id;
		$request["user_id"] = $userid;

		$data = UserPlanHistry::create($request->all());

        //update in user
		$User = User::where("id", $userid)->firstOrFail();
		$valid_days_for = Carbon::now()->addDays($request->valid_days_for);
		$User->plan_expire_on = $valid_days_for;
		$User->save();

		if ($data) {
			$response = [
				"success" => true,
				"message" => "success",
				"data" => $data,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				"success" => false,
				"message" => "something went wrong",
			];
			return response()->json($response);
		}
	}

	public function get_forum_category()
	{
		$ForumCategory = ForumCategory::all();
		return response()->json($ForumCategory, 200);
	}

}

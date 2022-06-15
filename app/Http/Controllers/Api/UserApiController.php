<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfileMaster;
use App\Models\UserEducation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;

class UserApiController extends Controller
{
    //
   public function signup(Request $request)
    {
       $data =[];
         try {
    
      if(($request->user_phone!='') && ($request->user_otp_code!='') ){
    //match otp
        $exist = User::where('user_phone',$request->user_phone)->where('user_otp_code',$request->user_otp_code)->first();
        if ($exist === null) {
              $response = [
                "success" => false,
                "message" => 'Wrong otp',
            ];
            return response()->json($response, 401);

        }else{

                if($exist->is_registered == 'Y'){
                    //login

             $tokenResult = $exist->createToken("Personal Access Token");
            $token = $tokenResult->token;
         
            $token->save();

             return response()->json([
                "status" => "true",
                "message" => "Otp match",
                 "access_token" => $tokenResult->accessToken,
                    "token_type" => "Bearer",
                    "expires_at" => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
                "data" => $exist
            ],200);

                }


            $exist->user_is_otp_verified = '1';
             $exist->save();
             return response()->json([
                "status" => "true",
                "message" => "Otp match",
                "data" => $exist
            ],200);

        }

      //End match otp            
      }else if($request->user_phone!=''){
   //send otp 
         $validator = Validator::make($request->all(), [
            "user_phone" => "required|digits:10", 
        ]);

         if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }
     
        $otp = rand(1000,9999);
        
        $user = User::firstOrNew(['user_phone' =>  $request->user_phone]); 
        $user->country_code = $request->country_code;
        $user->user_otp_code = $otp;
        $user->user_is_otp_verified = '0';
        $user->save();
          
        $data = $user->refresh();
          return response()->json([
                "status" => "true",
                "message" => "Successfully created user!",
                "data" => $data
            ],200);
             //End send otp 
    }
    else if($request->email!=''){
           //Email
         $validator = Validator::make($request->all(), [
            "email" => "required|string", 
            "full_name"=>"required|string",
            "preferred_name"=>"string",
            "pronounce_name"=>"string",
            "user_dob" => "required",
            "user_gender" => "required",
            "location" => "required|string",
            "latitude" => "",
            "longitude" => "",
            "image"=> "string",  
        ]);

         if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }
        $imageName = '';
       
        //end image
        $user = User::find($request->user_id);
        $user->email = $request->email;
        $user->full_name = $request->full_name;
        $user->preferred_name = $request->preferred_name;
        $user->pronounce_name = $request->pronounce_name;
        $user->user_dob = $request->user_dob;
        $user->user_gender = $request->user_gender;
        $user->location = $request->location; 
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->is_registered = 'Y';
        $user->image = 'profile/'.$imageName;
        $user->save();
        
        
         $UserProfileMaster = new UserProfileMaster([
            "verify" => $request->verify,
            "preferred_name" => $request->preferred_name,
             "user_id"=>$request->user_id
         ]);
        $UserProfileMaster->save();
        
        return response()->json([
                "status" => "true",
                "message" => "Save successfully",
                "data" => $data
            ],200);


    }else{
        $response = [
                "success" => false,
                "message" => "Empty field",
            ];
            return response()->json($response, 401);
    }
      

        } catch (\Exception $e) {

            return $e->getMessage();
        }

        
    }
 
    public function uploadimage(Request $request)
    {
         $validator = Validator::make($request->all(), [
            "image" => "image|mimes:jpeg,png,jpg|max:2048"
        ]);
       if ($validator->fails()) {
        $response = [
            "success" => false,
            "message" => $validator->messages(),
        ];
        return response()->json($response, 401);
      }

         //upload image
    $imageName = time().'.'.$request->image->extension(); 
    $request->image->storeAs('public/profile/', $imageName);
    
    return response()->json([
            "status" => "true",
            "message" => "Save successfully",
            "data" => $imageName
        ],200);
      
        
    }
    public function login(Request $request)
    {
        $data = [];
        
      if(($request->user_phone!='') && ($request->user_otp_code!='') ){
    //match otp
        $exist = User::where('user_phone',$request->user_phone)->where('user_otp_code',$request->user_otp_code)->first();
        if ($exist === null) {
              $response = [
                "success" => false,
                "message" => 'Wrong otp',
            ];
            return response()->json($response, 401);

        }else{

            $exist->user_is_otp_verified = '1';
             $exist->save();

             $tokenResult = $exist->createToken("Personal Access Token");
            $token = $tokenResult->token;
         
            $token->save();

             return response()->json([
                "status" => "true",
                "message" => "Otp match",
                 "access_token" => $tokenResult->accessToken,
                    "token_type" => "Bearer",
                    "expires_at" => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
                "data" => $exist
            ],200);

        }

       }else if($request->user_phone!=''){
   //send otp 
         $validator = Validator::make($request->all(), [
            "user_phone" => "required|digits:10", 
        ]);

         if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }
     
        $otp = rand(1000,9999);
        $user = User::where("user_phone", $request->user_phone)->first();

        if($user){

            $user->user_otp_code = $otp;
            $user->user_is_otp_verified = '0';
            $user->save();
              return response()->json([
                "status" => "true",
                "message" => "Send otp",
                "data" => $user
            ],200);

        }else{
             return response()->json([
                "status" => "true",
                "message" => "Mobile number invalid",
                "data" => $data
            ],401);
        }
 
    }

    } 

public function get_profile(Request $request){
    
    //$data = User::where('id',Auth::user()->id)->with('userprofilemaster')->get();
    
    $data = User::find($request->user_id);
    $pro = $data->userprofilemaster;
    $edu = $data->usereducation;
    $filter = $data->filterSetting;
     if($data){

          return response()->json([
                "status" => "true",
                "message" => "Successfully",
                "data" => $data
            ],200);
       
    }else{
        return response()->json([
                "status" => "false",
                "message" => "Invalid token",
                "data" => []
            ],401);
    }

 
}


//reset_password
public function reset_password(){

}

//change_password
public function change_password(Request $request){


    
}

//Update profile
public function update_profile(Request $request){
  
        $data = []; 
     $validator = Validator::make($request->all(), [
                "preferred_name"=>"alpha",
                "quote" =>"string",
                "boi" =>"string",
                "verify" =>"string",
                "job_title" =>"string",
                "job_company" =>"string",
                "education" =>"string",
                "flat" =>"string",
                "looking_roommate_date" =>"date", 
         ]);

         if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }
      

      try{

         $userid = $request->user_id;
         $user = User::findOrFail($request->user_id);
         
          if($request->has('gender')){ 
            $user->user_gender = $request->gender;
            }    
            if($request->has('preferred_name')){ 
                $user->preferred_name = $request->preferred_name;
            }
         $user->save(); 
          
        $UserProfileMaster = UserProfileMaster::firstOrNew(['user_id' =>  $userid]); 
        $UserProfileMaster->user_id = $userid;

            if($request->has('preferred_name')){ 
                $UserProfileMaster->preferred_name = $request->preferred_name;
            }   
            if($request->has('quote')){ 
                $UserProfileMaster->quote = $request->quote;
            }   
            if($request->has('boi')){ 
                $UserProfileMaster->user_profile_bio = $request->boi;
            }   
            if($request->has('verify')){ 
                $UserProfileMaster->verify = $request->verify;
            }   
            if($request->has('job_title')){ 
                $UserProfileMaster->job_title = $request->job_title;
            }   
            if($request->has('job_company')){ 
                $UserProfileMaster->job_company = $request->job_company;
            }   
            if($request->has('education')){ 
                $UserProfileMaster->education = $request->education;
            }
            if($request->has('flat')){ 
                $UserProfileMaster->flat = $request->flat;
            }
            if($request->has('looking_roommate_date')){ 
                $UserProfileMaster->looking_roommate_date = $request->looking_roommate_date;
            }
            if($request->has('budget_min')){ 
                $UserProfileMaster->budget_min = $request->budget_min;
            }
            if($request->has('budget_max')){ 
                $UserProfileMaster->budget_max = $request->budget_max;
            }
            if($request->has('religion')){ 
                $UserProfileMaster->religion = $request->religion;
            }
            if($request->has('food_preference')){ 
                $UserProfileMaster->food_preference = $request->food_preference;
            }
            if($request->has('room_temperature_min')){ 
                $UserProfileMaster->room_temperature_min = $request->room_temperature_min;
            }if($request->has('room_temperature_max')){ 
                $UserProfileMaster->room_temperature_max = $request->room_temperature_max;
            }
            if($request->has('smoke')){ 
                $UserProfileMaster->smoke = $request->smoke;
            }
            if($request->has('alcohol')){ 
                $UserProfileMaster->alcohol = $request->alcohol;
            } 
            if($request->has('marijuana')){ 
                $UserProfileMaster->marijuana = $request->marijuana;
            } 
            if($request->has('drugs')){ 
                $UserProfileMaster->drugs = $request->drugs;
            }  
            
            $UserProfileMaster->save();
            
            $data =  $user;
            $pro = $data->userprofilemaster;
            $edu = $data->usereducation;

              $response = [
                "success" => true,
                "message" => 'Update successfully',
                "data" =>$data
            ];
            return response()->json($response, 200);



      }
        catch (ModelNotFoundException $e) {
             $response = [
                "success" => false,
                "message" =>"something went wrong"
            ];
             return response()->json($response);
        }


    
    
}

//Add Education

public function add_education(Request $request){
    
        $data= [];
      $validator = Validator::make($request->all(), [
                "school_name"=>"required|string",
                "degree" =>"required|string",
                "specialization" =>"string",
                "session_from" =>"required",
                "session_to" =>"required",
                "user_id" =>"required",
                  
         ]);

         if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }
       // $userid = Auth::user()->id;
        $userid = $request->user_id;
        $request['user_id'] = $userid;
         try{
            
           $data = UserEducation::create($request->all());
           if($data){
           
            $response = [
                "success" => true,
                "message" => 'Added successfully',
                "data" =>$data
            ];
            return response()->json($response, 200);
           
           }else{
               $response = [
                "success" => false,
                "message" =>"something went wrong"
            ];
             return response()->json($response);
           }
            
        }catch (ModelNotFoundException $e) {
             $response = [
                "success" => false,
                "message" =>"something went wrong"
            ];
             return response()->json($response);
        }
    
}
public function update_education(Request $request){
    
        $data= [];
      $validator = Validator::make($request->all(), [
                "school_name"=>"required|string",
                "degree" =>"required|string",
                "specialization" =>"string",
                "session_from" =>"required",
                "session_to" =>"required",
                "id" =>"required",
                  
         ]);

         if ($validator->fails()) {
            $response = [
                "success" => false,
                "message" => $validator->messages(),
            ];
            return response()->json($response, 401);
        }
       // $userid = Auth::user()->id;
        $id = $request->id;
          try{
            
        $UserEducation = UserEducation::findOrFail($request->id);
         
          if($request->has('school_name')){ 
            $UserEducation->school_name = $request->school_name;
            }    
            if($request->has('degree')){ 
            $UserEducation->degree = $request->degree;
            }
            if($request->has('specialization')){ 
            $UserEducation->specialization = $request->specialization;
            }
            if($request->has('session_from')){ 
            $UserEducation->session_from = $request->session_from;
            }
            if($request->has('session_to')){ 
            $UserEducation->session_to = $request->session_to;
            }
        $data = $UserEducation->save(); 
         
         
            if($data){
           
            $response = [
                "success" => true,
                "message" => 'updated successfully',
                "data" =>$data
            ];
            return response()->json($response, 200);
           
           }else{
               $response = [
                "success" => false,
                "message" =>"something went wrong"
            ];
             return response()->json($response);
           }
            
        }catch (ModelNotFoundException $e) {
             $response = [
                "success" => false,
                "message" =>"something went wrong"
            ];
             return response()->json($response);
        }
    
}

}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Auth; 
use Carbon\Carbon; 
use DB;

class UserController extends Controller
{
    //


    public function changeStatus(Request $request){
       $user = User::find($request->user_id);
        $user->is_vendor = $request->status;
        $user->save();

         $details = [
        'title' => 'Mail from Idreamt',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('pradeepkmr096@gmail.com')->send(new \App\Mail\VendorapprovalMail($details));
   
  
        return response()->json(['success'=>'Status change successfully.']);
    }


   public function user_profile(Request $requset){
    $user = Auth::User(); 
    return view('user/profile', compact('user')); 
   }   

   public function update_profile(Request $request){
    $user_id = Auth::User()->id; 

     

     $User = User::find($user_id); 

        if($request->has('name')){ 
            $User->name = $request->name;
        }
        if($request->has('age')){ 
            $User->age = $request->age;
        }
        if($request->has('phone_no')){ 
            $User->phone_no = $request->phone_no;
        }
        if($request->has('bio')){ 
            $User->bio = $request->bio;
        }
        if($request->has('pseudo_name')){ 
            $User->pseudo_name = $request->pseudo_name;
        }
        if($request->has('occupation')){ 
            $User->occupation = $request->occupation;
        }
        if($request->has('city')){ 
            $User->city = $request->city;
        }
        if($request->image){  
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->storeAs('public/profile/', $imageName);  
            $User->images = $imageName;
        }  
            
      $data = $User->save();

      if($data){
        return \Redirect::back()->withSuccess( 'Saved Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
 
    } 
}

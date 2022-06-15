<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Student;
use Carbon\Carbon;
use DB;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
     return view('front/home');
    }
    public function save_std(Request $request)
    { 
        $validator = Validator::make($request->all(), [ 'name' => 'required', 'age' => 'required', 'class' => 'required','school_name' => 'required','father_name' => 'required','phone_number' => 'required', ]);

            if ($validator->fails()) { 
            return \Redirect::back()->withErrors($validator);
             }

             $student = new Student();
             $student->name = $request->name;
             $student->age = $request->age;
             $student->class = $request->class;
             $student->school_name = $request->school_name;
             $student->father_name = $request->father_name;
             $student->phone_number = $request->phone_number; 
             if($student->save()){
                return \Redirect::back()->withSuccess("Addedd Success!");
             }

        
     }
 
}

<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;
use DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    $student = Student::orderBy('id','desc')->get(); 
     return view('admin/student_list',compact('student'));

            }
    
     
 
     
}
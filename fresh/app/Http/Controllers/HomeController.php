<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Gallery;
use Carbon\Carbon;
use DB;


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
        $product = Product::latest('created_at')->with('author')->get();
        $testimonial = Testimonial::latest('created_at')->get();
        $gallery = Gallery::latest('created_at')->get();
          
        return view('front/home', compact('product','testimonial','gallery'));
    }

    public function newsletter(Request $request){
        
       $res =   DB::table('newslatters')->insert(
                ['email_id' => $request->email, 'created_at' =>  Carbon::now() ]
            );
       if($res){
        echo "You have successfully subscribed newsletter";

       }else{
        echo "Something went wrong!";
       }
    }

    public function user_dashboard(Request $request){

    return view('user/dashboard');
    }
    
    public function testmail(){
       $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('pradeepkmr096@gmail.com')->send(new \App\Mail\TestMail($details));
   
    }
}

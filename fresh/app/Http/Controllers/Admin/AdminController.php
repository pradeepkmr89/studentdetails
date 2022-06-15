<?php
namespace App\Http\Controllers\Admin;
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
use App\Imports\QuestionImport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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
    public function index()
    {
      
        $user = User::orderBy('id','desc')->limit('8')->get(); 
         
        return view('admin/dashboard',compact('user'));
    }
    
    public function user_list(Request $request){ 
     $users = User::orderBy('id','DESC')->get();
     return view('admin/user_list',compact('users')); 
    }

    public function newsletter_list(){
        $data = DB::table('newslatters')->get();
        return view('admin/newsletter/newsletter_list',compact('data'));    
    }
    
   
    public function cms(Request $request){ 
    $content = Content::all();
    return view('admin/cms_edit',compact('content'));  
    }
    
    public function getcontent(Request $request){ 
    $content = Content::select('description')->where('id',$request->cmsid)->get();
     return response()->json([$content[0]->description]); 
    }
    
    public function update_cms(Request $request){ 
        $content=Content::where('id', $request->cmsid)
       ->update([
           'description' => $request->description
        ]);
        if($content){
        return \Redirect::back()->withSuccess( 'Updated Successfully' );
        }else{
          return \Redirect::back()->withWarning( 'Something Went Worng' );  
        }

    }
    
    public function user_transaction(Request $request){
        $userplan = UserPlanHistry::where('user_id',$request->user_id)->get();
        return response()->json($userplan); 
    }
    
    public function get_forumcategory(Request $request){
        $ForumCategory = ForumCategory::all();
        return view('admin/list_forum_category',compact('ForumCategory')); 
    }
    public function saveforumcategory(Request $request){
        if($request->category_id!=''){
            //update
            
            $ForumCategory = ForumCategory::where('id', $request->category_id)
               ->update([
                   'category_name' => $request->category_name
                ]);
                return response()->json("success"); 
        }else{

            //add
            $ForumCategory = new ForumCategory();
            $ForumCategory->category_name = $request->category_name;
            $ForumCategory->save();
            return response()->json("success"); 
            
            
        }
        
    }
    public function forumcategorydelete($id){
        $res=ForumCategory::where('id',$id)->delete();
         return \Redirect::back()->withSuccess( 'Deleted Successfully' );

    }
    
    
    public function get_forum_post(){
    $data=ForumPost::with(['category'])->get();
    return view('admin/list_forum_post',compact('data'));  
    } 
    
    public function create_forum_post(){
    $data=ForumCategory::all();
    return view('admin/add_forum_post',compact('data'));  
    }
    
    public function save_forum_post(Request $request){
         
    $imageName = time().'.'.$request->image->extension(); 
    $request->image->storeAs('public/post/', $imageName);
    
    $request['media'] = $imageName;
     $data = $request->except(['submit','image']);
    $data = ForumPost::create($data);
        
    if($data){
        return \Redirect::back()->withSuccess( 'Added Successfully' );
    }else{
        return \Redirect::back()->withWarning( 'Something Went Worng' );
    } 
    
    }
    
    public function edit_forum_post($id){
        
    $data = ForumPost::find($id); 
    $category = ForumCategory::all();
    
    return view('admin/edit_forum_post',compact('data','category')); 
    }
    
    public function update_forum_post(Request $request){
       
       $forumPost = ForumPost::find($request->id); 
        if($request->has('title')){ 
            $forumPost->title = $request->title;
        }
        if($request->has('description')){ 
            $forumPost->description = $request->description;
        } 
        if($request->has('category_id')){ 
            $forumPost->category_id = $request->category_id;
        }   
        if($request->image){
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->storeAs('public/post/', $imageName);
            $forumPost->media = $imageName;
        }
            
      $data = $forumPost->save();
      if($data){
        return \Redirect::back()->withSuccess( 'Saved Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }
    
    public function delete_forum_post($id){
    $res = ForumPost::where('id',$id)->delete();
    return \Redirect::back()->withSuccess('Deleted Successfully');

    }
    
    public function add_question(Request $request){
    $category = QuestionCategory::where('parent_id','0')->get();
    return view('admin/add_question',compact('category')); 
    }
    
    public function get_question_category(Request $request){
     $category = QuestionCategory::where('parent_id',$request->category_id)->where('status','1')->get();
     return response()->json($category); 
    }
    
    public function save_question(Request $request){
    $dataArr = $request->except(['submit','image']);
    $data = Question::create($dataArr);
    if($data){
        return \Redirect::back()->withSuccess( 'Saved Successfully' );
        }else{
        return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }
    
    public function get_question(Request $request){
           $subcategory = [];
           $subsubcategory = [];
           if($request->has('subsubcategory_id')){ 
            $category_id = $request->category_id;
            $subcategory_id = $request->subcategory_id;
            $subsubcategory_id = $request->subsubcategory_id;
             $question = Question::where('sub_sub_category_id',$subsubcategory_id)->with('category','subcategory')->get();
             $subsubcategory = questionCategory::where('parent_id',$subcategory_id)->where('status','1')->get();
             $subcategory = questionCategory::where('parent_id',$category_id)->where('status','1')->get();

} else if($request->has('subcategory_id')){ 
            $category_id = $request->category_id;
            $subcategory_id = $request->subcategory_id;
             $question = Question::where('sub_category_id',$subcategory_id)->with('category','subcategory')->get();
             $subsubcategory = questionCategory::where('parent_id',$subcategory_id)->where('status','1')->get();
             $subcategory = questionCategory::where('parent_id',$category_id)->where('status','1')->get();

}
     else if($request->has('category_id')){ 
    $category_id = $request->category_id;
     $question = Question::where('category_id',$category_id)->with('category','subcategory')->get();
     $subcategory = questionCategory::where('parent_id',$category_id)->where('status','1')->get();
     //$subsubcategory = questionCategory::where('parent_id','0')->get();
      }
 else{
     $question = Question::with('category','subcategory')->get();
      }
     $category = questionCategory::where('parent_id','0')->where('status','1')->get();
      return view('admin/list_question',compact('question','category','subcategory','subsubcategory'));   
    }
    
    public function edit_question($id){
     $data = Question::where('id',$id)->get();
      $category = QuestionCategory::where('parent_id','0')->get();
     return view('admin/edit_question',compact('data','category'));   
    }
    
    public function update_question(Request $request){
        
        
      $data = Question::where('id', $request->id)
       ->update([
           'question' => $request->question,
           'category_id' => $request->category_id,
           'sub_category_id' => $request->sub_category_id,
           'sub_sub_category_id' => $request->sub_sub_category_id,
           'status' => $request->status,
           'reversely_coded' => $request->reversely_coded,
        ]);
        
    if($data){
        return \Redirect::back()->withSuccess( 'Saved Successfully' );
        }else{
        return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }
    
    public function delete_question($id){
    $res = Question::where('id',$id)->delete();
    return \Redirect::back()->withSuccess('Deleted Successfully'); 
    }  
    
    public function import_question() 
    {
        Excel::import(new QuestionImport,request()->file('file')); 
        return \Redirect::back()->withSuccess( 'Import Successfully' );
    }
    
    public function get_import_question() 
    {
        $category = questionCategory::all();
        return view('admin/import_excel',compact('category')); 
    }
    
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;

class GallaryController extends Controller
{
    
    public function index(Request $request){
        $data = Gallery::all();
         return view('admin/gallery/list',compact('data'));
    }

    public function create(Request $request){
        return view('admin/gallery/create');
    }

    public function save(Request $request){ 
        $imageName = '';
        if ($request->image) {
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->storeAs('public/galleries/', $imageName);
         
        } 
        
        $data = $request->except(['submit','image']);
        $data['images'] = $imageName;
        $data = Gallery::create($data);

        if($data){
            return \Redirect::back()->withSuccess( 'Added Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }

    public function edit(Request $request,$id){

        $data = Gallery::where('id',$id)->first();
        return view('admin/gallery/edit', compact('data'));
        
    }

    public function update(Request $request){  
        $imageName = '';
        if ($request->image) {
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->storeAs('public/galleries/', $imageName);
         
        }  
         $request['images'] = $imageName;
 
        $data = Gallery::where('id',$request->id)->update(array('name'=>$request->name,'images'=>$request->images)); 

        if($data){
            return \Redirect::back()->withSuccess( 'Updated Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }

    public function delete($id){
        $data=Gallery::where('id',$id)->delete();

        if($data){
            return \Redirect::back()->withSuccess( 'Deleted Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }
}

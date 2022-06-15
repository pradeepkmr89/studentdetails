<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class TestimonialController extends Controller
{ 
    public function index(Request $request){
        $data = Testimonial::all();
         return view('admin/testimonials/list',compact('data'));
    }

    public function create(Request $request){
        return view('admin/testimonials/create');
    }

    public function save(Request $request){
        
        $data = $request->except(['submit','image']);
        
        $data = Testimonial::create($data);

        if($data){
            return \Redirect::back()->withSuccess( 'Added Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }

    public function edit(Request $request,$id){

        $data = Testimonial::where('id',$id)->first();
        return view('admin/testimonials/edit', compact('data'));
        
    }

    public function update(Request $request){  
        $data = Testimonial::where('id',$request->id)->update(array('name'=>$request->name,'description'=>$request->description)); 
        if($data){
            return \Redirect::back()->withSuccess( 'Updated Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }

    public function delete($id){
        $data=Testimonial::where('id',$id)->delete();

        if($data){
            return \Redirect::back()->withSuccess( 'Deleted Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }
}

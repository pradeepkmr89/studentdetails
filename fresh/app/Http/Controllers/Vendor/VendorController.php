<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use Auth; 
use Carbon\Carbon; 
use DB;

class VendorController extends Controller
{
    //

   public function upload_artwork(){
    return view('vendor.upload_artwork');
   }

   public function save_artwork(Request $request){
      $imageName = '';
        if ($request->image) {
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->storeAs('public/products/', $imageName);
        } 
        
        $data = $request->except(['submit','image']);
        $data['user_id'] = Auth::user()->id;
        $data['image'] = $imageName;
 
        $data = Product::create($data);

        if($data){
            return \Redirect::back()->withSuccess( 'Added Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
   }

   public function list_artwork(){
    $data = Product::where('user_id',Auth::user()->id)->orderBy('id')->get();
    return view('vendor.list_artwork', compact('data'));
   }


    public function edit_artwork(Request $request,$id){ 
        $data = Product::where('id',$id)->first();
        return view('vendor.edit_artwork', compact('data')); 
    }

    public function update_artwork(Request $request){
         
         if($request->image){
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->storeAs('public/products/', $imageName);
        }   
       
        $data = Product::find($request->id);

        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->storeAs('public/products/', $imageName);
             $data->image = $imageName;
          } 
        $data->product_name = $request->product_name;
        $data->description = $request->description;
       
        $data->save();
 
        if($data){
            return \Redirect::back()->withSuccess( 'Updated Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }

    public function artwork_delete($id){
        $data=Product::where('id',$id)->delete();

        if($data){
            return \Redirect::back()->withSuccess( 'Deleted Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }


}

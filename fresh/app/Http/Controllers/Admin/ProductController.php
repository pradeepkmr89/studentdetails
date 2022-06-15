<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
 
class ProductController extends Controller
{
    //

    public function index(Request $request){
        $data = Product::all();

        return view('admin/products/list',compact('data'));
    }

    public function create(Request $request){
        return view('admin/products/create');
    }

    public function save(Request $request){
        $imageName = '';
        if ($request->image) {
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->storeAs('public/products/', $imageName);
        } 
        
        $data = $request->except(['submit','image']);
        $data['user_id'] = '0';
        $data['image'] = $imageName;
 
        $data = Product::create($data);

        if($data){
            return \Redirect::back()->withSuccess( 'Added Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }

    public function edit(Request $request,$id){

        $data = Product::where('id',$id)->first();
        return view('admin/products/edit', compact('data'));
        
    }

    public function update(Request $request){
        $imageName = '';
         if($request->image){
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->storeAs('public/products/', $imageName);
        }  
        
        $data['user_id'] = '0';
        $data['image'] = $imageName;
 
        $data = Product::where('id',$request->id)->update(array('product_name'=>$request->product_name,'description'=>$request->description,'affliated_link'=>$request->affliated_link,'category_id'=>$request->category_id,'image'=> $imageName));

        if($data){
            return \Redirect::back()->withSuccess( 'Updated Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }

    public function delete($id){
        $data=Product::where('id',$id)->delete();

        if($data){
            return \Redirect::back()->withSuccess( 'Deleted Successfully' );
        }else{
            return \Redirect::back()->withWarning( 'Something Went Worng' );
        } 
    }
}

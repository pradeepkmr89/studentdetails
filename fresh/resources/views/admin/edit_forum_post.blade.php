@extends('admin.layout.base')
@section('title', 'User List ')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@endsection
@section('content')
<div id="main-content">
        <div class="container-fluid">
              <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Edit Forum Post</h1>
                       
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="{{url('admin/get/forum/post')}}" class="btn btn-sm btn-primary" title="">Go Back</a>
                     </div>
                </div>
            </div>
            <div class="block-header">
                 @if( Session::has( 'success' ))
                    <div class="alert alert-success" role="alert">
                      {{ Session::get( 'success' ) }}
                    </div> 
                @elseif( Session::has( 'warning' )) 
                 <div class="alert alert-danger" role="alert">
                    {{ Session::get( 'warning' ) }}
                    </div> 
                   
                @endif
                <form method="post"  enctype="multipart/form-data" action="{{url('admin/update/forum/post')}}">
                    @csrf
                <div class="row clearfix">
                <div class="col-lg-6 col-md-12">
                    <label>Enter Post Title</label>
                    <div class="input-group mb-3">
                         <input required type="text" class="form-control" name="title" placeholder="Enter Post Title" value="{{$data->title}}">
                         <input  type="hidden" name="id"  value="{{$data->id}}">
                     </div> 
                </div>
                <div class="col-lg-6 col-md-12">
                    <div>
                        <label>Select Category</label>
                        <div class="input-group mb-3"> 
                        <select class="form-control" required name="category_id">
                            <option value="">select category</option>
                            @foreach($category as $val)
                            <option value="{{$val->id}}" <?php if($data->category_id == $val->id){ echo "selected"; }   ?>>
                            {{$val->category_name}}</option>
                            @endforeach
                        </select>
                         </div>
                    </div>
                    
                </div>
                <div class="col-lg-12 col-md-12">
                    <div>
                        <label>Select Image</label>                                    
                        <div class="input-group">
                            <input type="file" name="image" class="dropify">
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-12 col-md-12">
                    <label>Description</label>
                    <div class="">
                         <textarea name="description" id="ckeditor" class="cmsdesc">{{$data->description}}</textarea>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mt-3">
                     <div class="">
                         <button class="btn btn-success btn-lg" type="submit" name="submit">Save Forum Post</button>
                    </div>
                </div>
            </div>
                 </form>         
             </div>
           
 
        </div>
    </div>
    
@endsection 
@push('scripts')
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>
<script src="{{ asset('html/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('html/assets/js/pages/forms/dropify.js') }}"></script>
 @endpush
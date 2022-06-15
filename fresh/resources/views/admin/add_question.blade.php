@extends('admin.layout.base')
@section('title', 'Create Question')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
@endsection
@section('content')
<div id="main-content">
        <div class="container-fluid">
              <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Create Question</h1>
                       
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="{{url('admin/get/question')}}" class="btn btn-sm btn-primary" title="">Go Back</a>
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
                <form method="post"  enctype="multipart/form-data" action="{{url('admin/save/question')}}">
                    @csrf
                <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <label>Enter Post Title</label>
                    <div class="input-group mb-3">
                         <input required type="text" class="form-control" name="question" placeholder="Enter Post Title">
                     </div> 
                </div>
                <div class="col-lg-4 col-md-12">
                    <label>Status</label>
                    <div class="input-group mb-3">
                        <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                        </select>
                    </div> 
                </div>
                <div class="col-lg-4 col-md-12">
                    <label>Reversely Coded</label>
                    <div class="input-group mb-3">
                        <select name="reversely_coded" id="reversely_coded" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                        </select>
                    </div> 
                </div>
                <div class="col-lg-4 col-md-12">
                    <div>
                        <label>Select Category</label>
                        <div class="input-group mb-3"> 
                        <select class="form-control" required name="category_id" id="category">
                            <option value="">select category</option>
                            @foreach($category as $val)
                            <option value="{{$val->id}}">{{$val->category_title}}</option>
                            @endforeach
                        </select>
                       
                         </div>
                    </div> 
                </div>
                <div class="col-lg-4 col-md-12">
                    <div>
                        <label>Select Sub Category</label>
                        <div class="input-group mb-3"> 
                        <select class="form-control" name="sub_category_id" id="subcategory"> 
                        </select>
                         </div>
                    </div> 
                </div>
                <div class="col-lg-4 col-md-12">
                    <div>
                        <label>Select Sub  SubCategory</label>
                        <div class="input-group mb-3"> 
                        <select class="form-control" name="sub_sub_category_id" id="subsubcategory"> 
                        </select>
                         </div>
                    </div> 
                </div>
                  <input type="hidden" value="" class="category_id" />
                
                <div class="col-lg-12 col-md-12 mt-3">
                     Response Range: <span class="response_range"></span>
                </div><div class="col-lg-12 col-md-12 mt-3">
                     <div class="">
                         <button class="btn btn-success btn-lg" type="submit" name="submit">Save Question</button>
                    </div>
                </div>
            </div>
                 </form>         
             </div>
           
 
        </div>
    </div>
    
@endsection 
@push('scripts')

 <script>
        $(document).ready(function(k, v) {
            $("#category").change(function() {
                var selectedCategoryId = $(this).val();
                $(".category_id").val(selectedCategoryId);
                if (selectedCategoryId == 1) {
                    $(".response_range").text("1 (Disagree strongly), 2 (Disagree a little), 3 (Neither agree nor disagree), 4 (Agree a little), 5 (Agree strongly)");
                } else if (selectedCategoryId == 2) {
                    $(".response_range").text("1 (Disagree strongly), 2 (Disagree a little), 3 (Neither agree nor disagree), 4 (Agree a little), 5 (Agree strongly)");
                } else if (selectedCategoryId == 3) {
                    $(".response_range").text("0 (never), 2 (rarely), 4 (once in a while), 6 (fairly often), 8 (always)");
                } else {
                    $(".response_range").text("");
                }
                $.ajax({
                    "url": "{{url('admin/get/question/category')}}",
                    "type": "POST",
                     "dataType": "json",
                    "data": {
                       "_token":"{{ csrf_token() }}","category_id": selectedCategoryId
                    },
                    "success": function(response) {
                       
                        $("#subcategory").html("").append('<option value="">Select Sub Category</option>');
                        $.each(response, function(k, v) {
                            console.log(v);
                            $("#subcategory").append('<option value="' + v["id"] + '">' + v["category_title"] + '</option>');
                        }); 
                    }
                });
            });
            
              $("#subcategory").change(function() {
                var selectedCategoryId = $(this).val();
                $(".category_id").val(selectedCategoryId);
                $.ajax({
                    "url": "{{url('admin/get/question/category')}}",
                    "type": "POST",
                     "dataType": "json",
                    "data": {
                       "_token":"{{ csrf_token() }}","category_id": selectedCategoryId
                    },
                    "success": function(response) {
                         $("#subsubcategory").html("").append('<option value="">Select Sub Sub Category</option>');
                        $.each(response, function(k, v) {
                            $("#subsubcategory").append('<option value="' + v["id"] + '">' + v["category_title"] + '</option>');
                        });
                    }
                });
            });
            
             $("#subsubcategory").change(function() {
                if ($(this).val()) {
                    $(".category_id").val($(this).val());
                }
            });
            

        });
    </script>
 @endpush
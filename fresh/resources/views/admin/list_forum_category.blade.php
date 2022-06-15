@extends('admin.layout.base')
@section('title', 'User List ')
@section('styles') 
@endsection
@section('content')


<div id="main-content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
               <h1>Forum Category</h1>
            </div>
         </div>
      </div>
      <div class="row clearfix">
         <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h2>Add / Edit Forum Category</h2>
                            <ul class="header-dropdown dropdown">                                
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                         <span id="spinner_border" style="display:none"><div class="spinner-border" ></div></span>
                             <h6>Category Name</h6>
                             <span id="showres"></span>
                           <div class="form-group">
                            <input type="text" id="category_name" class="form-control" placeholder="Enter Category Name">
                            <input type="hidden" id="category_id" class="form-control" >
                        </div> 
                        <button type="button" class="btn btn-round btn-primary" id="saverecord">Save</button>
                         </div>
                    </div>
                </div>
            <div class="col-xl-8 col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                <h2>Forum Category</h2>
                <ul class="header-dropdown dropdown">                                
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
               <div class="body">
                   @if( Session::has( 'success' ))
                    <div class="alert alert-success" role="alert">
                      {{ Session::get( 'success' ) }}
                    </div> 
                @elseif( Session::has( 'warning' )) 
                 <div class="alert alert-danger" role="alert">
                    {{ Session::get( 'warning' ) }}
                    </div> 
                   
                @endif
                  <div class="table-responsive">
                     <table class="table table-striped table-hover js-exportable">
                        <thead>
                           <tr>
                            <th>#</th>
                            <th>Category Name</th> 
                            <th>Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                           <tr>
                            <th>#</th>
                            <th>Category Name</th> 
                            <th>Date</th>
                            <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           @foreach($ForumCategory as $key=>$val) 
                           <tr>
                              <td>{{++$key}}</td>
                              <td>{{$val->category_name}}</td>
                             <td>{{date('d-m-Y', strtotime($val->created_at));}}</td>
                              <td><a href="javascript::void(0);" data-id="{{$val->id}}" data-name="{{$val->category_name}}" class="btn btn-warning editid">Edit</a>
                             &nbsp;&nbsp;&nbsp;<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('forum-category-delete', $val->id)}}">Delete</a>
 </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('scripts')
 <script>
    $("#saverecord").on('click', function(){ 
         $("#spinner_border").show();
          var category_id = $("#category_id").val();
         var category_name = $("#category_name").val();
           $.ajax({
                
                url: "{{url('admin/saveforumcategory')}}",
                type: "post",
                data: {"_token":"{{ csrf_token() }}",category_id:category_id,category_name:category_name},
                success: function(d) {
                     $("#spinner_border").hide();
                if(d=='success'){
                    $("#showres").html(`<div class="alert alert-success" role="alert">
                     Saved Successfully
                    </div>`)
                setTimeout(function() {
                 window.location.reload();
                }, 2000);
                }
                else{
                 $("#showres").html(`<div class="alert alert-danger" role="alert">
                      Oops! Something went wrong.
                    </div>`)
                setTimeout(function() {
                 window.location.reload();
                }, 2000);   
                }
            }
            });
        
         
        });
        
    $(".editid").on('click', function(){
        $("#category_id").val($(this).data('id'));
        $("#category_name").val($(this).data('name'));
        $("#saverecord").text("Update");

     })
 </script>
@endpush
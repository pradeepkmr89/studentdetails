@extends('admin.layout.base')
@section('title', 'Question List ')
@section('styles')
@endsection
@section('content')
<div id="main-content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
               <h1>Question Listing</h1>
            </div>
            <div class="col-md-6 col-sm-12 text-right hidden-xs">
               <a href="{{url('admin/get/import/question')}}" class="btn btn-sm btn-primary" title="">Import CSV</a>
               <a href="{{url('admin/add/question')}}" class="btn btn-sm btn-primary" title="">Create Question</a>
            </div>
         </div>
      </div>
      <div class="row clearfix">
         <div class="col-12">
            <div class="card">
               <div class="body">
                  <div class="row">
                     <div class="col-lg-4 col-md-6">
                        <select class="form-control"  onchange ="location = this.options[this.selectedIndex].value;" >
                           <option value="">Select</option>
                           @foreach($category as $key=>$val)
                           <?php $select ='';
                              if( request()->get('category_id') ){  
                                   $category_id =request()->get('category_id') ;
                                 if($category_id == $val->id) {
                                    $select = "selected"; 
                                 } 
                              }
                              ?>
                           <option {{$select}} value="{{url('admin/get/question?category_id='.$val->id)}}">{{$val->category_title}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <select class="form-control"  onchange ="location = this.options[this.selectedIndex].value;" >
                           <option value="">Select Sub category</option>
                           @if( request()->get('category_id') )
                           @foreach($subcategory as $skey=>$sval)
                           <?php $sselect =''; 
                              if( request()->get('subcategory_id') ){  
                                    $category_id =request()->get('category_id') ;
                                  $subcategory_id =request()->get('subcategory_id') ;
                                if($subcategory_id == $sval->id) {
                                   $sselect = "selected"; 
                                } 
                              }
                              ?>
                           <option {{$sselect}} value="{{url('admin/get/question?category_id='.$category_id.'&subcategory_id='.$sval->id)}}">{{$sval->category_title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <select class="form-control"  onchange ="location = this.options[this.selectedIndex].value;" >
                           <option value="">Select Sub category</option>
                           @if( request()->get('subcategory_id') )
                           @foreach($subsubcategory as $sskey=>$ssval)
                           <?php $ssselect =''; 
                              if( request()->get('subsubcategory_id') ){  
                                    $category_id =request()->get('category_id') ;
                                  $subcategory_id =request()->get('subcategory_id') ;
                                  $subsubcategory_id =request()->get('subsubcategory_id') ;
                                if($subsubcategory_id == $ssval->id) {
                                   $ssselect = "selected"; 
                                } 
                              }
                              ?>
                           <option {{$ssselect}} value="{{url('admin/get/question?category_id='.$category_id.'&subcategory_id='.$subcategory_id.'&subsubcategory_id='.$ssval->id)}}">{{$ssval->category_title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12">
            @if( Session::has( 'success' ))
            <div class="alert alert-success" role="alert">
               {{ Session::get( 'success' ) }}
            </div>
            @elseif( Session::has( 'warning' )) 
            <div class="alert alert-danger" role="alert">
               {{ Session::get( 'warning' ) }}
            </div>
            @endif
            <div class="card">
               <div class="body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Question</th>
                              <th>Category</th>
                              <th>Sub Category</th>
                              <th>Sub Sub Category</th>
                              <th>Status</th>
                              <th>Reversely Coded</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>#</th>
                              <th>Question</th>
                              <th>Category</th>
                              <th>Sub Category</th>
                              <th>Sub Sub Category</th>
                              <th>Status</th>
                              <th>Reversely Coded</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           @foreach($question as $key=>$val) 
                           <tr>
                              <td>{{++$key}}</td>
                              <td>{{$val->question}}</td>
                              <td>{{$val->category->category_title}}</td>
                              <td>@if($val->subcategory){{$val->subcategory->category_title}}@endif</td>
                              <td> @if($val->subsubcategory){{$val->subsubcategory->category_title}}@endif</td>
                              <td>{{ ($val->status =='1') ? 'Active' : 'Inactive' }}</td>
                              <td>{{ ($val->reversely_coded =='1') ? 'Yes' : 'No' }}</td>
                              <td>
                                 <a class="btn btn-warning" href="{{url('admin/edit/question/'.$val->id)}}">Edit</a>
                                 <a class="btn btn-danger" onclick="return confirm('Are you sure?')" 
                                    href="{{route('admin.delete-question', $val->id)}}">Delete</a>
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
@endpush
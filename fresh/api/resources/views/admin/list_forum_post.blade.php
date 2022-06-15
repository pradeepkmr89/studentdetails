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
                        <h1>Forum Post Listing</h1>
                       
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="{{url('admin/create/forum/post')}}" class="btn btn-sm btn-primary" title="">Create Post</a>
                     </div>
                </div>
            </div>
    
      <div class="row clearfix">
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
                              <th>Title</th>
                              <th>Description</th>
                              <th>Category</th>
                              <th>Image</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>Title</th> 
                              <th>Description</th>
                              <th>Category</th>
                              <th>Image</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           @foreach($data as $val) 
                           <tr>
                              <td>{{$val->title}}</td>
                              <td>{{ \Illuminate\Support\Str::limit(strip_tags($val->description), 30, '...') }}</td>
                              <td>{{$val->category->category_name}}</td>
                              <td><img src="{{ url('storage/post/'.$val->media) }}" style="height: 50px;"/> </td>
                              
                              <td>
                                <a class="btn btn-warning" href="{{url('admin/edit/forum/post/'.$val->id)}}">Edit</a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" 
                                href="{{route('admin.delete_forumpost', $val->id)}}">Delete</a>
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
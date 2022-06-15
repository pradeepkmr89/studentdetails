@extends('admin.layout.base')
@section('title', 'User List ')
@section('styles')
@endsection
@section('content')
<div class="content">
<div class="container-fluid">
<div class="page-title-box">
<div class="row align-items-center">
    <div class="col-sm-6">
        <h4 class="page-title">Products List</h4>
    </div>
     <div class="col-sm-6 ">
     	<a href="{{url('admin/product/create')}}" class="btn btn-primary btn-lg float-right">  <i class="mdi mdi-gamepad-round"></i> Add Product</a>
     </div>
     
</div> <!-- end row -->
</div>
<div class="row">
<div class="col-12">
    <div class="card m-b-30">
        <div class="card-body"> 
        	 @if( Session::has( 'success' ))
                    <div class="alert alert-success" role="alert">
                      {{ Session::get( 'success' ) }}
                    </div> 
                @elseif( Session::has( 'warning' )) 
                 <div class="alert alert-danger" role="alert">
                    {{ Session::get( 'warning' ) }}
                    </div> 
                   
                @endif


            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Vendor</th>
                     <th>Image</th>
                     <th>Created At</th> 
                    <th>Action</th>
                </tr>
                </thead>
                 <tfoot>
                    <tr>
                      <th>#</th>
                    <th>Product Name</th>
                    <th>Vendor</th>
                     <th>Image</th>
                     <th>Created At</th> 
                    <th>Action</th>
                    </tr>
                 </tfoot>


                <tbody>
               @foreach($data as $key=>$val) 
              <tr>
                 <td>{{++$key}}</td>
                 <td>{{$val->product_name}}</td>
                 <td>{{$val->user_id == '0' ?'Admin':''}}</td>  

                  <td><img src="{{ url('storage/products/'.$val->image) }}" alt="" title="" /> </td>
                 <td>{{ \Carbon\Carbon::parse($val->created_at)->format('d/m/Y')}}
</td>
                 <td>
                   <a href="{{url('admin/product/edit/'.$val->id)}}" class="btn btn-primary waves-effect waves-light" > Edit</a> &nbsp;&nbsp;&nbsp;  <a  class="btn btn-danger waves-effect waves-light"  onclick="return confirm('Are you sure?')" href="{{route('admin.product.delete', $val->id)}}"> Delete</a>
                       
              </tr>
              @endforeach
                
                </tbody>
            </table>

        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->   
</div>
<!-- container-fluid -->

</div>
@endsection

@push('scripts')

  
@endpush
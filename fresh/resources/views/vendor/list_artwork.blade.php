@extends('layouts.vendor.base')

@section('title', 'Dashboard ')

@section('styles')
 @endsection

@section('content')
 <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">List Artwork</h4>
                    </div>
                    <div class="col-sm-6">
                         
                    </div>
                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @include('layouts.formres')                       
                            
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th> 
                     <th>Image</th>
                      <th>Created At</th> 
                    <th>Action</th>
                </tr>
                </thead>
                 <tfoot>
                    <tr>
                      <th>#</th>
                    <th>Product Name</th> 
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
                  <td><img src="{{ url('storage/products/'.$val->image) }}" alt="" title="" style="height:50px" /> </td>
                  <td>{{ \Carbon\Carbon::parse($val->created_at)->format('d/m/Y')}}</td>
                 
                 <td>
                 	@if($val->status == 'PENDING')
                 	
                 	<div class="alert alert-warning " role="alert">  Product Under Review  </div>

                 	@else
                   <a href="{{url('user/artwork/edit/'.$val->id)}}" class="btn btn-primary waves-effect waves-light" > Edit</a> &nbsp;&nbsp;&nbsp;  <a  class="btn btn-danger waves-effect waves-light"  onclick="return confirm('Are you sure?')" href="{{route('user.artwork.delete', $val->id)}}"> Delete</a>
                   @endif
               </td>
                       
              </tr>
              @endforeach
                
                </tbody>
            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row --> 

        </div>     

    @endsection

@section('scripts') 


@endsection
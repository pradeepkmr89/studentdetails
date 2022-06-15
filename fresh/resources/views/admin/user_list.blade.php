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
                                    <h4 class="page-title">User List</h4>
                                </div>
                                 
                            </div> <!-- end row -->
                        </div>
                         <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">User List</h4>
                                        
        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Image</th>
                                                 
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                             <tfoot>
                                                <tr>
                                                   <th>#</th>
                                                   <th>Full Name</th>
                                                   <th>Email</th>
                                                   <th>Phone</th>
                                                   <th>Image</th>
                                                   
                                                   <th>Action</th>
                                                </tr>
                                             </tfoot>
        
        
                                            <tbody>
                                           @foreach($users as $key=>$user) 
                                          <tr>
                                             <td>{{++$key}}</td>
                                             <td>{{$user->name}}</td>
                                             <td>{{$user->email}}</td>
                                             <td>{{$user->phone}}</td>
                                             <td><img src="{{ url('storage/'.$user->image) }}" alt="" title="" /> </td>
                                             
                                             <td>
                                               <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light" >Edit</a> &nbsp;&nbsp;&nbsp;  <a href="javascript:void(0);" class="btn btn-danger waves-effect waves-light" >Delete</a>
                                                   
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
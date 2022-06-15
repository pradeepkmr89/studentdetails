@extends('admin.layout.base')
@section('title', 'User List ')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/nestable/jquery-nestable.css') }}"/>

@endsection
@section('content')
<div id="main-content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
               <h1>Report User List</h1>
            </div>
         </div>
      </div>
      <div class="row clearfix">
         <div class="col-lg-12">
            <div class="card">
               <div class="body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover dataTable js-exportable">
                        <thead>
                           <tr>
                               <th>Reported User Details</th>
                              <th>Reason</th> 
                              <th>Reported By</th>
                              <th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>Reported User Details</th>
                              <th>Reason</th> 
                              <th>Reported By</th>
                              <th>Date</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           @foreach($users as $user) 
                           <tr>
                              <td>
                                  Full Name: {{$user->reportedby_name}}
                                  <br/>Email: {{$user->reportedby_email}}
                                  <br/>Phone: {{$user->reportedby_phone}}
                              
                              </td>
                              <td>{{$user->reason}}</td>
                              <td>  Full Name: {{$user->reportedto_name}}
                                  <br/>Email: {{$user->reportedto_email}}
                                  <br/>Phone: {{$user->reportedto_phone}}
                              </td>
                               <td>{{date('d-m-Y', strtotime($user->created_date));}}</td>
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
@section('scripts') 
@endsection
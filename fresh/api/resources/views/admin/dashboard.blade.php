@extends('admin.layout.base')

@section('title', 'Dashboard ')

@section('styles')
 @endsection

@section('content')
 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Dashboard</h1>
                       
                    </div>            
                  
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>Total User</div>
                            <div class="py-4 m-0 text-center h1 text-success">{{$total_user}}</div>
                            <div class="d-flex">
                            <small class="text-muted">Register this week</small>
                            <div class="ml-auto">{{$total_user / $last7days}}%</div> 
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>Today's Register</div>
                            <div class="py-4 m-0 text-center h1 text-success">{{$today_user}}</div>
                            <div class="d-flex"> 
                            <small class="text-muted">Register this week</small>
                            <div class="ml-auto">{{$total_user / $last7days}}%</div> 
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>Total Male User</div>
                            <div class="py-4 m-0 text-center h1 text-success">{{$total_male}}</div>
                            <div class="d-flex"> 
                            <small class="text-muted">Register this week</small>
                            <div class="ml-auto">{{$total_user / $last7days}}%</div> 
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div>Total Female User</div>
                            <div class="py-4 m-0 text-center h1 text-success">{{$total_female}}</div>
                            <div class="d-flex"> 
                            <small class="text-muted">Register this week</small>
                            <div class="ml-auto">{{$total_user / $last7days}}%</div> 
                            </div>
                        </div>
                    </div> 
                </div>
                
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>By Gender</h2>
                        </div>
                        <div class="body">
                            <div class="d-flex bd-highlight mb-3 text-center">
                                <div class="flex-fill bd-highlight">
                                    <label class="mb-0 text-muted">Male</label>
                                    <h5>{{$total_male}}</h5>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <label class="mb-0 text-muted">Female</label>
                                    <h5>{{$total_female}}</h5>
                                </div>
                            </div>
                            <div id="chart-donut" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Recent Registered Users</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-custom2 table-hover">
                                <thead>
                                     
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>DOB</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($user as $key=>$val)
                                    <tr>
                                        <td><span>{{++$key}}</span></td>
                                        <td><span>{{$val->fullname}}</span></td>
                                        <td><span>{{$val->user_phone}}</span></td>
                                        <td><span>{{$val->email}}</span></td>
                                        <td><span>{{$val->user_dob}}</span></td>
                                        <td><span>{{$val->created_at->diffForHumans()}}</span></td>
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

    @endsection

@section('scripts') 
@endsection
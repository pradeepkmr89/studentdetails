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
                        <h4 class="page-title">Profile</h4>
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
                            <form method="post" action="{{url('user/profile')}}" enctype="multipart/form-data"> 
                                @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="p-20">
                                         
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" placeholder=""  class="form-control" name="name" value="{{ (old('name')) ?: $user->name}}" /> 
                                </div>
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="text" placeholder=""  class="form-control" name="age" value="{{ (old('age')) ?: $user->age}}"> 
                                </div>
                             <div class="form-group">
                                    <label>Phone No</label>
                                    <input type="text" placeholder=""  class="form-control" name="phone_no" value="{{ (old('phone_no')) ?: $user->phone_no}}"> 
                                </div>
                             <div class="form-group">
                                    <label>Bio</label>
                                    <textarea  class="form-control" name="bio">{{$user->bio}}</textarea>
                                 </div>
                                        

                                       
                                    </div>
                                </div>
                               

                                <div class="col-lg-6">
                                    <div class="p-20">
                                <div class="form-group">
                                <label>Pseudo Name</label>
                                <input type="text" placeholder=""  class="form-control" name="pseudo_name" value="{{ (old('pseudo_name')) ?: $user->pseudo_name}}"> 
                            </div>
                            <div class="form-group">
                            <label>Occupation</label>
                            <input type="text" placeholder=""  class="form-control" name="occupation" value="{{ (old('occupation')) ?: $user->occupation}}"> 
                             </div>
                             <div class="form-group">
                            <label>City</label>
                            <input type="text" placeholder=""  class="form-control" name="city" value="{{ (old('city')) ?: $user->city}}"> 
                             </div>
                            <div class="form-group">
                            <label>Profile Images</label>
                          
                        <input type='file'  name="image" >
                             </div>
                                   

                                    </div>
                                </div> <!-- end col -->
                                <button type="submit" class="btn btn-success ml-3" name="update"> Update Profile</button>

                            </div> <!-- end row -->
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row --> 

        </div>     

    @endsection

@section('scripts') 


@endsection
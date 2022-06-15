<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
<link href="{{ asset('vendor_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor_assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor_assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor_assets/css/style.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
                <a href="{{url('/')}}" class="text-white"><i class="fas fa-home h2"></i></a>
            </div>
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                        </div>
                        <h5 class="font-18 text-center">Register</h5>
    
                        <form method="POST" action="{{ route('register') }}">
                        @csrf

                            <div class="form-group">
                                <div class="col-12">
                                        <label>name</label>
                                    <input class="form-control" name="name"  type="text" required="" value="{{ old('name') }}" placeholder="name">
                                </div>
                            </div> 
                          <div class="form-group">
                                <div class="col-12">
                                        <label>pseudo name</label>
                                    <input class="form-control" name="pseudo_name" type="text"  value="{{ old('pseudo_name') }}"required="" placeholder="pseudo name">
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="col-12">
                                        <label>age</label>
                                    <input class="form-control" type="text" required="" value="{{ old('age') }}" name="age" placeholder="age">
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-12">
                                        <label>occupation</label>
                                    <input class="form-control" type="text" required="" value="{{ old('occupation') }}" name="occupation" placeholder="occupation">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                        <label>phone no</label>
                                    <input class="form-control" type="text" required="" value="{{ old('phone_no') }}" name="phone_no" placeholder="Phone no">
                                </div>
                            </div>  
                             <div class="form-group">
                                        <div class="col-12">
                                                <label>Email</label>
                                            <input name="email"  class="form-control" value="{{ old('email') }}" type="text" required="" placeholder="Email">
                                        </div>
                                    </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>password</label>
                                    <input name="password" class="form-control" type="password" required="" placeholder="password">
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="col-12">
                                        <label>city</label>
                                    <input class="form-control" type="text"   name="city"  value="{{ old('city') }}" placeholder="city">
                                </div>
                            </div>  
     
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>
    
                            <div class="form-group mb-0 row">
                                    <div class="col-12 m-t-10 text-center">
                                        <a href="{{url('login')}}" class="text-muted">Already have account?</a>
                                    </div>
                                </div>
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('vendor_assets//js/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor_assets//js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor_assets//js/metismenu.min.js') }}"></script>
        <script src="{{ asset('vendor_assets//js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('vendor_assets//js/waves.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('vendor_assets//js/app.js') }}"></script>
        
    </body>

</html>
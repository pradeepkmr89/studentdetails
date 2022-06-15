<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin | Login</title>
        <meta content="Admin" name="description" />
        <meta content="Admin" name="author" />
        <link rel="shortcut icon" href="#">

        <link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin_assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet" type="text/css"> 
    </head>

    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
         
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                               <!--  <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-light.png" alt="" height="24"></a> -->

                        </div>
                        <h5 class="font-18 text-center">Login</h5>
    
                        <form class="form-auth-small"  method="POST" action="{{ route('login') }}">
                         @csrf
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Email</label>
                                    <input class="form-control" type="email" required="" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                                      
                                    @if ($errors->has('email'))
                                  <span ><strong>{{ $errors->first('email') }}</strong></span>
                                  @endif
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>

                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                </div>
                            </div>
    
                             
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
     
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->

        <!-- jQuery  -->

        <script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin_assets/js/waves.min.js') }}"></script> 
        <!-- App js -->
         <script src="{{ asset('admin_assets/js/app.js') }}"></script> 
        
    </body>

</html> 
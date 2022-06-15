<!doctype html>
<html lang="en">

<head>
<title>Admin | Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
 
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="#" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">
 
<!-- MAIN CSS -->
 <link rel="stylesheet" href="{{ asset('html/assets/css/site.min.css') }}">
</head>

<body class="theme-cyan font-montserrat">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="auth-main2 particles_js">
    <div class="auth_div vivify fadeInTop">
        <div class="card">            
            <div class="body">
                <div class="login-img">
                    <img class="img-fluid" src="{{ asset('assets/images/login-img.png') }}" />
                </div>
                
                <form class="form-auth-small"  method="POST" action="{{ route('admin.login.submit') }}">
                  {{ csrf_field() }}
                    <div class="mb-3">
                        <p class="lead">Login to your account</p>
                    </div>
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">Email</label> 
                        <input type="email" name=email class="form-control round" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                      <span ><strong>{{ $errors->first('email') }}</strong></span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                       <input type="password" name="password" class="form-control round" required>

                    </div>
                     
                    <button type="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>
                  
                </form>
                <div class="pattern">
                    <span class="red"></span>
                    <span class="indigo"></span>
                    <span class="blue"></span>
                    <span class="green"></span>
                    <span class="orange"></span>
                </div>
            </div>            
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
    
<script src="{{ asset('html/assets/bundles/libscripts.bundle.js') }}"></script>    
<script src="{{ asset('html/assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('html/assets/bundles/mainscripts.bundle.js') }}"></script>
</body>
</html>

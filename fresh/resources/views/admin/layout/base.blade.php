<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
     <meta content="" />
    <meta content=" " name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

 <!-- DataTables -->
<link href="{{ asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Responsive datatable examples -->
<link href="{{ asset('admin_assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Morris Chart CSS -->
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/morris/morris.css') }}">

<link href="{{ asset('admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin_assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet" type="text/css">  
<link href="{{ asset('admin_assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
  @stack('styles')
 </head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        @include('admin.layout.header') 
        @include('admin.layout.leftnav') 
   <div class="content-page">
       @yield('content')  

    <footer class="footer">
        © 2019 - 2020 Admin 
    </footer>

</div> 
        
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    
    @include('admin.layout.footer')
    @stack('scripts')
</body>

</html>

 
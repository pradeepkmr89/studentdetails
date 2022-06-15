<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Idreamt </title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

     <!-- DataTables -->
<link href="{{ asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Responsive datatable examples -->
<link href="{{ asset('admin_assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


    <!--Chartist Chart CSS -->
    <link rel="stylesheet" href="{{ asset('vendor_assets/plugins/chartist/css/chartist.min.css') }}">

    <link href="{{ asset('vendor_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor_assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor_assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor_assets/css/style.css') }}" rel="stylesheet" type="text/css">

    <style type="text/css">
        #topnav .topbar-main {
    background: #c5c5c5 !important;
}
    </style>
 @stack('styles')
</head>

<body>

  @include('layouts.vendor.header')

    <div class="wrapper">
        @yield('content')
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->
 

    <!-- jQuery  -->
    <script src="{{ asset('vendor_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor_assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('vendor_assets/js/waves.min.js') }}"></script>
 
    <!--Chartist Chart-->
    <script src="{{ asset('vendor_assets/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('vendor_assets/js/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('vendor_assets/pages/chartist.init.js') }}"></script>
    <script src="{{ asset('vendor_assets/js/app.js') }}"></script>
 <script src="{{ asset('admin_assets/plugins/tinymce/tinymce.min.js')}}"></script>

 

<!-- datatable -->
<script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

     <script>

      $(function() {
        $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
            var user_id = $(this).data('id'); 
             
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                  console.log(data.success)
                }
            }); 
        })
      })
    </script>
  @stack('scripts')
    <!-- App js -->
 
</body>

</html>



 
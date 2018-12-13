<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Dashboard | March Fashion</title>
    <!-- Favicon -->
    <link href="{{ asset('admin-assets/images/favicon.png') }}" rel="icon" type="image/png">
    <!-- Bootstrap -->
    <link href="{{ asset('admin-assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('admin-assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin-assets/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin-assets/libs/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('admin-assets/libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="{{ asset('admin-assets/libs/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- File Upload -->
    <link href="{{ asset('admin-assets/css/file-upload.css') }}" rel="stylesheet" >

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin-assets/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- left sidebar -->
            @include('admin.layouts.fixed-left-sidebar')
            <!-- /left sidbar -->

            <!-- top navigation -->
            @include('admin.layouts.top-navigation')
            <!-- /top navigation -->

            <!-- page content -->
            @yield('content')
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    March Fashion Dashboard - Designed by Yen Dang.
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin-assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin-assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin-assets/libs/fastclick/lib/fastclick.js') }}"></script>
    {{-- <!-- NProgress -->
    <script src="{{ asset('admin-assets/libs/nprogress/nprogress.js') }}"></script>
    <!-- jQuery Smart Wizard -->
    <script src="{{ asset('admin-assets/libs/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script> --}}
    <!-- jQuery custom content scroller -->
    <script src="{{ asset('admin-assets/libs/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('admin-assets/libs/iCheck/icheck.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin-assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('admin-assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- File upload -->
    <script src="{{ asset('admin-assets/js/file-upload.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admin-assets/build/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>

  </body>
</html>
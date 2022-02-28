<!DOCTYPE html>
<html>
    <head>
        @include('admin.layouts.head')
    </head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
          
            @yield('content')

            <!-- Main content -->
           
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- /.footer -->

        @include('admin.layouts.footer')


        <!-- Control Sidebar -->
        
    <!-- ./wrapper -->

    @include('admin.layouts.footer-section')
</body>

</html>
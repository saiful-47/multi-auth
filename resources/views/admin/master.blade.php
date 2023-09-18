<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.meta')
    <title>AdminLTE 3 | Dashboard</title>
    @include('admin.partials.style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.partials.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('admin.partials.sidebar')
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.partials.footer')
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- jQuery -->
@include('admin.partials.script')
</body>
</html>


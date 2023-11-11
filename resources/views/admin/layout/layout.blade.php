<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>پنل مدیریت | داشبورد دوم</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url('admin/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('admin/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{url('admin/dist/css/bootstrap-rtl.min.css')}}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{url('admin/dist/css/custom-style.css')}}">
    @vite('resources/css/app.css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
    <!-- Navbar -->
@include('admin.layout.header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin.layout.sidebar')

<!-- Content Wrapper. Contains page content -->
    @yield('content')

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('admin.layout.footer')
    @vite('resources/js/app.js')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('admin/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{url('admin/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="{{url('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jVectorMap -->
<script src="{{url('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{url('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.2 -->
<script src="{{url('admin/plugins/chartjs-old/Chart.min.js')}}"></script>
<!-- DataTables -->
<link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.css')}}">
<!-- PAGE SCRIPTS -->
<script src="{{url('admin/dist/js/pages/dashboard2.js')}}"></script>

<!-- DataTables -->
<script src="{{url('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('admin/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('admin/plugins/fastclick/fastclick.js')}}"></script>


<script>
    $(function () {
        $("#example1").DataTable({
            "language": {
                "paginate": {
                    "next": "بعدی",
                    "previous" : "قبلی"
                }
            },
            "info" : false,
        });
        $('#example2').DataTable({
            "language": {
                "paginate": {
                    "next": "بعدی",
                    "previous" : "قبلی"
                }
            },
            "info" : false,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "autoWidth": false
        });
    });
</script>

</body>
</html>

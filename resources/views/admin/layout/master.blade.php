<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{asset('admin/images/favicon_1.ico')}}">
    <title>@yield('title')</title>


    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />


    <link href="{{asset('admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">


    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet" />


    <link href="{{asset('admin/css/waves-effect.css')}}" rel="stylesheet">


    <link href="{{asset('admin/assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">


    <link href="{{asset('admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css" />



    <script src="{{asset('admin/js/modernizr.min.js')}}"></script>

    <!-- DataTables -->
    <link href="{{asset('admin/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

</head>



<body class="fixed-left">

@include('sweetalert::alert')

<!-- Begin page -->
<div id="wrapper">

    @include('admin.layout.header')

    @include('admin.layout.left_bar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">@yield('title')</li>
                        </ol>
                    </div>
                </div>

                @yield('admin.content')

            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.layout.footer')

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/waves.js')}}"></script>
<script src="{{asset('admin/js/wow.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('admin/assets/chat/moment-2.2.1.js')}}"></script>
<script src="{{asset('admin/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('admin/assets/jquery-detectmobile/detect.js')}}"></script>
<script src="{{asset('admin/assets/fastclick/fastclick.js')}}"></script>
<script src="{{asset('admin/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

<!-- sweet alerts -->
<script src="{{asset('admin/assets/sweet-alert/sweet-alert.min.js')}}"></script>
<script src="{{asset('admin/assets/sweet-alert/sweet-alert.init.js')}}"></script>

<!-- flot Chart -->
<script src="{{asset('admin/assets/flot-chart/jquery.flot.js')}}"></script>
<script src="{{asset('admin/assets/flot-chart/jquery.flot.time.js"')}}"></script>
<script src="{{asset('admin/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('admin/assets/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{asset('admin/assets/flot-chart/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin/assets/flot-chart/jquery.flot.selection.js')}}"></script>
<script src="{{asset('admin/assets/flot-chart/jquery.flot.stack.js')}}"></script>
<script src="{{asset('admin/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

<!-- Counter-up -->
<script src="{{asset('admin/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="{{asset('admin/js/jquery.app.js')}}"></script>

<!-- Dashboard -->
<script src="{{asset('admin/js/jquery.dashboard.js')}}"></script>

<!-- Chat -->
<script src="{{asset('admin/js/jquery.chat.js')}}"></script>

<!-- Todo -->
<script src="{{asset('admin/js/jquery.todo.js')}}"></script>

<script src="{{asset('admin/assets/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/datatables/dataTables.bootstrap.js')}}"></script>

<script src="{{asset('admin/js/sweetalert2.js')}}"></script>

<script type="text/javascript">
    /* ==============================================
    Counter Up
    =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>

@stack('custom.js')

</body>
</html>

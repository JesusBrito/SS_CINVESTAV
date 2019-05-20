<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  @include('documents::layouts.includes.head')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('documents::layouts.includes.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('documents::layouts.includes.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('documents::layouts.includes.footer')

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset("js/app.js") }}"></script>

<!-- jQuery 3 -->
<script src="{{ asset("/js/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/js/adminlte.min.js") }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <!-- Slimscroll -->
<script src="{{ asset("/js/jquery.slimscroll.min.js") }}"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset("/js/bootstrap-datepicker.min.js") }}"></script>
<script src="{{ asset("/js/bootstrap-datepicker.es.min.js") }}"></script>


@stack('extra-js')

<script type="text/javascript">
  $('#FechaNac').datepicker({format: 'yyyy/mm/dd',language: 'es', autoclose: true});
  $('.ano').datepicker({
      format: "yyyy",
      viewMode: "years",
      minViewMode: "years",
      autoclose: true,
      language: 'es'});
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
</body>
</html>

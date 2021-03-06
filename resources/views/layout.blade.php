<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CINVESTAV</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset("/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("/css/AdminLTE.min.css")}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset("css/skin-blue.min.css")}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset("/css/bootstrap-datepicker.min.css")}}">
  <!-- Cambio de Título-->
<!-- <link rel="stylesheet" href="{{asset("/admin-lte/texto.css")}}"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">



    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>Nombre del Sistema</b>CINVESTAV</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
      </div>


    </nav>
  </header>

@yield('contenido')


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Nombre del Sistema
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://www.cinvestav.mx">CINVESTAV</a>.</strong>
  </footer>



<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset("/js/jquery.min.js")}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("/js/bootstrap.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/js/adminlte.min.js")}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. -->
<!-- Slimscroll -->
<script src="{{asset("/js/jquery.slimscroll.min.js")}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset("/js/bootstrap-datepicker.min.js")}}"></script>
<script src="{{asset("/js/bootstrap-datepicker.es.min.js")}}"></script>

<script src="{{ asset("js/config.js") }}"></script>
<!--validar cosas de usuario-->
<script src="{{ asset("js/users.js") }}"></script>


<script type="text/javascript">
  $('.fecha').datepicker({format: 'yyyy/mm/dd',language: 'es', autoclose: true});
  $('.fecha').datepicker().datepicker("setDate", new Date());
  $('.ano').datepicker({
      format: "yyyy",
      viewMode: "years",
      minViewMode: "years",
      autoclose: true,
      language: 'es'});
</script>

@stack('extra-js')

</body>
</html>

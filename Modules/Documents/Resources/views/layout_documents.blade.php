<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestión de Productos de Investigación</title>
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
  <link rel="stylesheet" href="{{asset("css/skin-yellow-light.min.css")}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset("/css/bootstrap-datepicker.min.css")}}">
  <!-- Cambio de Título-->
<link rel="stylesheet" href="{{asset("/admin-lte/texto.css")}}">


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
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="paginaprincipal.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>PI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">CINVESTAV</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

       <a href="paginaprincipal.html" class="navbar-brand">
      <!-- logo for regular state and mobile devices -->
      <span id=><b id="texto"></b></span>
      </a>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notificacion de mensajes nuevos</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="{{Storage::url(auth()->user()->Imagen)}}" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Nuevo comentario
                        <small><i class="fa fa-clock-o"></i> 10 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Se ha comentado en la actividad X</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="vernotificaciones.html">Ver todos los mensajes</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->





          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{Storage::url(auth()->user()->Imagen)}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{auth()->user()->Nombre}} {{auth()->user()->A_Paterno}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{Storage::url(auth()->user()->Imagen)}}" class="img-circle" alt="User Image">

                <p>
                    {{auth()->user()->Nombre}} {{auth()->user()->A_Paterno}} - {{auth()->user()->Tipo_Usuario}}

                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-body">

                  <div class="pull-left text-center">
                  <a href="{{url('/documents/usuarios/show')}}" class="btn btn-default btn-flat">Perfil  </a>
                </div>
                 <div class="col-xs-4 text-center">
                  <a href="sistema.html" class="btn btn-default btn-flat">Sistema <br> inventarios</a>
                </div>
                <div class="pull-right text-center">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Cerrar <br> sesión</a>

              </div>

              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{Storage::url(auth()->user()->Imagen)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->Nombre}} {{auth()->user()->A_Paterno}}</p>

        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
        <!-- Optionally, you can add icons to the links -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Administrar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: all;">
            <li class="active"><a href="registrousuarios.html"><i class="fa fa-user-plus"></i>Registro de Nuevo Usuario</a></li>
            <li><a href="todosalumnos.html"><i class="fa fa-list-ul"></i>Listado de Alumnos</a></li>
            <li><a href="todosgrupos.html"><i class="fa fa-list-ul"></i>Listado de Grupos</a></li>
            <li><a href="todosprofesores.html"><i class="fa fa-list-ul"></i>Listado de Profesores</a></li>

          </ul>
        </li>

         <li><a href="alumnosprofesores.html"><i class="fa fa-group"></i> <span>Listado de Alumnos</span></a></li>

        <li><a href="registrarestancia.html"><i class="fa fa-globe"></i> <span>Estancias</span></a></li>
        <li><a href="registrarcolaboracion.html"><i class="fa fa-users"></i> <span>Colaboraciones</span></a></li>
        <li><a href="registrarcurso.html"><i class="fa fa-pencil-square-o"></i> <span>Cursos</span></a></li>
        <li><a href="crearconvenio.html"><i class="fa fa-puzzle-piece"></i> <span>Convenios</span></a></li>
        <li><a href="registrarconferencia.html"><i class="fa fa-calendar"></i> <span>Conferencias</span></a></li>
        <li><a href="registrarpatente.html"><i class="fa fa-certificate"></i> <span>Patentes</span></a></li>
        <li><a href="registrartesis.html"><i class="fa fa-graduation-cap"></i> <span>Tesis</span></a></li>
        <li><a href="registrarpublicaciones.html"><i class="fa fa-file-text"></i> <span>Publicaciones</span></a></li>
        <li><a href="registrarcongreso.html"><i class="fa fa-institution"></i> <span>Congresos</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  @yield('Contenido')

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Gestión de Productos de Investigación
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://www.cinvestav.mx">CINVESTAV</a>.</strong>
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset("/js/jquery.min.js")}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("/js/bootstrap.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/js/adminlte.min.js")}}"></script>

<!--validar cosas de usuario-->
<script src="{{asset("/js/usuarios.js")}}"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <!-- Slimscroll -->
<script src="{{asset("/js/jquery.slimscroll.min.js")}}"></script>

<!-- bootstrap datepicker -->
<script src="{{asset("/js/bootstrap-datepicker.min.js")}}"></script>


<script src="{{asset("/js/bootstrap-datepicker.es.min.js")}}"></script>
@stack('scripts')




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

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">


  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


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
 

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Nivel</a></li>
        <li class="active">Inicio de sesión</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      
      
      
   <div class="login-box">
  <div class="login-logo">
    <b>Iniciar sesión</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <form action="paginaprincipal.html" method="post">
      <div class="form-group has-feedback">
         <label>Correo electrónico:</label>
        <input id="txtCorreo" type="email" class="form-control" placeholder="ejemplo@gmail.com">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
         <label>Contraseña:</label>
        <input id="txtPassword" type="password" class="form-control" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       <div class="form-group">
                  <label>Selecciona el sistema al que quieres ingresar:</label>
                  <select class="form-control" id=slsexo>
                    <option value="0" selected="true">Documentos</option>
                    <option value="1">Inventarios</option>
                  </select>
                </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
      
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    <a href="#">Olvidé mi contraseña</a><br>
   
  </div>
  <!-- /.login-box-body -->
<div id="extwaiimpotscp" style="display:none" v="{5776" f="ZXpVM056WmlaRGt3TFROa01Ea3RORE5pTlMxaE56WTVMVGhrWVRNM00yVTVPREl3Wm4wPQ==" q="78882913" c="56.29" i="69.04" u="1.361" s="18121906" w="false" m="BMe=" vn="0tres"></div></div>

  
    
   
      


   </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Nombre del Sistema
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Compañía</a>.</strong>
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
@extends('layout')

@section('contenido')
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

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      
      
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
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    <a href="#">Olvidé mi contraseña</a><br>
   
  </div>
  <!-- /.login-box-body -->
<div id="extwaiimpotscp" style="display:none" v="{5776" f="ZXpVM056WmlaRGt3TFROa01Ea3RORE5pTlMxaE56WTVMVGhrWVRNM00yVTVPREl3Wm4wPQ==" q="78882913" c="56.29" i="69.04" u="1.361" s="18121906" w="false" m="BMe=" vn="0tres"></div></div>

  
    
   <!--------------------------
        | Your Page Content Here |
        -------------------------->
      


   </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop
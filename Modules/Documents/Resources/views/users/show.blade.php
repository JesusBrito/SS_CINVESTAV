@extends('documents::layouts.app')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bienvenido(a) {{ auth()->user()->nombre_completo }}

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Nivel</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-warning">
            <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ auth()->user()->imagen }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ auth()->user()->nombre_completo }}</h3>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Información del Usuario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Educación</strong>

              @foreach(auth()->user()->detalleNiveles() as $detail)
                    <p class="text-muted">
                        <i class="fa fa-mortar-board margin-r-5"></i>
                        {{ $detail->carrera }} en {{ $detail->escuela }}
                    </p>
                    <p class="text-muted">
                        Generación: {{ $detail->ingreso }} - {{ $detail->egreso }}
                    </p>
                @endforeach
              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i>Correo electrónico</strong>
             <p class="text-muted" id="txtCorreo">
                {{ auth()->user()->email }}
              </p>

              <hr>

              <strong><i class="fa fa-phone margin-r-5"></i>Número</strong>
             <p class="text-muted" id="txtNumero">
                {{ auth()->user()->celular }}
              </p>

              <hr>

              <strong><i class="fa fa-calendar margin-r-5"></i>Fecha de nacimiento</strong>
             <p class="text-muted" id="txtFecha">
                {{ auth()->user()->fecha_nacimiento }}
              </p>

              <hr>

              <strong><i class="fa fa-user margin-r-5"></i>Sexo</strong>
             <p class="text-muted" id="txtSexo">
                @if(auth()->user()->sexo==1)
                    Hombre
                @else
                    Mujer
                @endif
              </p>

              <hr>

                <strong><i class="fa fa-table margin-r-5"></i>Grupo</strong>
             <p class="text-muted" id="txtGrupo">
                Grupo 1
              </p>

              <hr>


              <div class="box-footer">

                <a class="btn btn-app" href="{{ url('documents/usuarios/'.auth()->user()->id.'/edit') }}"><i class="fa fa-edit"></i>Modificar datos</a>

                 <a class="btn btn-app" href="#"><i class="fa fa-file-text"></i>Generar CV</a>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->



          <div class="col-md-8">
            <div class="box box-warning">
              <div class="box-header">
                <h3 class="box-title">Actividades</h3>
              </div>

             <!-- Post -->
             <div class="box-body">
                <div class="post">

                  <div class="user-block">
                        <span class="username">
                          <a href="#">Tesis</a>

                        </span>
                    <span class="description">Fecha de modificación: 23-04-19</span>

                  </div>
                  <!-- /.user-block -->
                  <p id="txtTesis">Nombre Tesis</p>
                  <p id="txtSinodal">Nombre Sinodal</p>
                  <br>

                  <ul class="list-inline">
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comentarios
                        (5)</a>
                    </li>
                  </ul>
                 <a class="btn btn-app" href="registrartesis.html"><i class="fa fa-edit"></i>Modificar</a>




                </div>
                <!-- /.post -->

               <!-- Post -->
                <div class="post">

                  <div class="user-block">

                        <span class="username">
                          <a href="#">Conferencia</a>

                        </span>
                    <span class="description">Fecha de modificación: 23-04-19</span>

                  </div>
                  <!-- /.user-block -->
                  <p id="txtConferencia">Nombre conferencia</p>
                  <p id="txtParticipacion">Participante / Oyente</p>
                  <br>


                  <ul class="list-inline">
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comentarios
                        (5)</a>
                    </li>
                  </ul>
                   <a class="btn btn-app" href="registrartesis.html"><i class="fa fa-edit"></i>Modificar</a>


                </div>
                <!-- /.post -->
              </div>

          </div>
        </div>

        <!-- /.col -->
      </div>

   <!--------------------------
        | Your Page Content Here |
        -------------------------->



    </section>
    <!-- /.content -->
  
@stop

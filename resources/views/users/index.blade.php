@extends('documents::layouts.app')
@section ('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Usuarios
        <small>Aquí se muestran todos los usuarios del sistema</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li>Administrar</li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="row">

          <div class="col-md-12">
            <div class="box box-warning">
              <div class="box-header with-border">
               <h3 class="box-title">Usuarios</h3>
              </div>

              <form role="form">

              <div class="box-body">

              <div class="col-md-12">

                 <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">

                  <div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Buscar: <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="box-body table-responsive no-padding">
                     <table id="tblUsuarios" class="table table-hover">

                      <thead>
                        <tr role="row">
                          <th>Tipo de usuario</th>
                          <th>Nombre(s)</th>
                          <th>Apellido paterno</th>
                          <th>Apellido materno</th>
                          <th>Grupo</th>
                          <th>Fecha de nacimiento</th>
                          <th>Sexo</th>
                          <th>Teléfono</th>
                          <th>Correo electrónico</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($users as $user)
                        <tr role="row" class="odd">
                          <td class="sorting_1">{{$user->tipo_usuario}}</td>
                          <!--luego lo agrego, XD-->
                          <td>{{$user->nombre}}</td>
                          <td>{{$user->a_paterno}}</td>
                          <td>{{$user->a_materno}}</td>
                          <td>Grupo</td>
                          <td>{{$user->fecha_nacimiento}}</td>
                          <td>{{$user->sexo}}</td>
                          <td>{{$user->celular}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                            <div class="btn-group form-inline">
                              <a class="btn btn-primary" href="{{ route('users.edit', auth()->user()) }}">Editar</a>
                            </div>
                            <div class="btn-group form-inline">
                              <button type="button" class="btn btn-primary" id="btnEliminar">Eliminar</button>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
                </div>
                <!-- /.box-body -->
               </form>
              </div>
            </div>
          </div>
   <!--------------------------
        | Your Page Content Here |
        -------------------------->
     </section>
    <!-- /.content -->
@endsection

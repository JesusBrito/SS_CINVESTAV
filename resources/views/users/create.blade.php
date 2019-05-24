@extends('documents::layouts.app')
@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agregar usuario
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li>Administrar</li>
        <li class="active">Agregar Usuario</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
               <h3 class="box-title">Llene los siguientes campos</h3>
              </div>
            <form method="POST" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data">
              @csrf

              <div class="box-body">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tipo de usuario</label>
                  <select class="form-control" id="tipo_usuario" required name="tipo_usuario">
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtnombre">Nombre(s)</label>
                  <input class="form-control" type="text" name="nombre" maxlegth="30" id="nombre" value="" required>
                </div>

                <div class="form-group">
                  <label for="txtappat">Apellido paterno</label>
                  <input class="form-control" type="text" id="a_paterno" maxlegth="20" name="a_paterno" value="" required>
                </div>

                 <div class="form-group">
                  <label for="txtapmat">Apellido materno</label>
                  <input class="form-control" type="text" id="a_materno" maxlegth="20" name="a_materno" value="" required>
                </div>
            <!--
                <div class="form-group">
                  <label>Grupo</label>
                  <select class="form-control" id=slgrupo>
                    <option value="Grupo" selected="true">Grupo 1</option>

                  </select>
                </div>
            -->
                 <!--<div class="form-group">
                    <label>Grupo al que está incrito actualmente</label>
                    <select class="form-control" disabled="" id="slgrupo">
                      <option value="g1">Grupo 1</option>
                      <option value="g2">Grupo 2</option>
                    </select>
                </div>-->
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="fecha_nacimiento">Fecha de nacimiento</label>
                  <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required value=""">
                </div>

                <div class="form-group">
                  <label>Sexo</label>
                  <select class="form-control" required id="sexo" name="sexo">
                      <option value="Hombre">Hombre</option>
                      <option value="Mujer">Mujer</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtnumero">Número de teléfono</label>
                  <input class="form-control" type="text" pattern="[0-9]{10}" id="celular" value="" name="celular" maxlength="10" placeholder="5512345678">
                </div>

                <div class="form-group">
                    <div class="form-group has-feedback">
                      <label for="txtcorreo">Correo electrónico</label>
                      <input type="email" required class="form-control" value="" name="email" id="email" placeholder="ejemplo@email.com" required>
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                  <label for="flfoto">Añadir foto de perfil</label>
                  <input type="file" id="imagen" name="imagen" accept="image/*" >
                  <p class="help-block">Suba una fotografía en formato .jpg o .png</p>
                </div>
                 <!--<div class="form-group">
                    <label>Grupo al que está incrito actualmente</label>
                    <select class="form-control" disabled="" id="slgrupo">
                      <option value="g1">Grupo 1</option>
                      <option value="g2">Grupo 2</option>
                    </select>
                </div>-->
                <button type="submit" class="btn btn-primary pull-right" id="btnSave" name="btnSave">
                  <i class="glyphicon glyphicon-ok"></i> Guardar
                </button>
                <br>
                <br>
              </div>
            </form>

              <div class="form-group">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Grados de estudio registrados</h3>
                      </div>
                      <div class="box-body table-responsive no-padding">
                        <table id="detalles" class="table table-hover">
                          <thead>
                            <tr>
                              <th>Grado</th>
                              <th>Escuela</th>
                              <th>Carrera o estudios</th>
                              <th>Año inicio</th>
                              <th>Año término</th>
                              <th>Estatus</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>

                          <tbody id="details">
                          </tbody>
                      </table>
                      </div>
                      <hr/>
                      <div class="box-header">
                          <h3 class="box-title">Agregar grado de estudios</h3>
                        </div>
                      <div class="box-body table-responsive no-padding">
                          <table  class="table table-hover">
                              <thead>
                              <tr>
                                  <th>Grado</th>
                                  <th>Escuela</th>
                                  <th>Carrera o estudios</th>
                                  <th>Año inicio</th>
                                  <th>Año término</th>
                                  <th>Estatus</th>
                              </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                  <td>
                                      <select class="form-control" name="id_nivel" required>
                                      @foreach($levels as $level)
                                          <option value="{{ $level->id }}">{{ $level->grado }}</option>
                                      @endforeach
                                      </select>
                                  </td>
                                  <td>
                                      <input class="form-control" type="text" name="escuela" required>
                                  </td>
                                  <td>
                                      <input class="form-control" type="text" name="carrera" required>
                                  </td>
                                  <td>
                                      <input class="form-control ano" type="text" name="fecha_inicio" required>
                                  </td>
                                  <td>
                                      <input class="form-control ano" type="text" name="fecha_fin" required>
                                  </td>
                                  <td>
                                      <select class="form-control" name="estatus" required>
                                      <option value="En progreso">En progreso</option>
                                      <option value="Egresado">Egresado</option>
                                      <option value="Pasante">Pasante</option>
                                      <option value="Titulado">Titulado</option>
                                      </select>
                                  </td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                      <div class="box-footer clearfix">
                        <div class="btn-group pull-right">
                          <button type="button" class="btn btn-block btn-default" id="btnAddDetail">
                            <i class="fa fa-plus-circle"></i> Agregar
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                </div>
                <!-- /.box-body -->

              <div class="box-footer">

              </div>
              <!-- /.box-footer -->

              </div>
            </div>
          </div>
    </section>
@endsection


@push ('extra-js')
  <script src="{{ asset('js/users.js') }}"></script>
  <script>
    let urlLevelDetails = '{{ route('level-details.index') }}'
  </script>
@endpush

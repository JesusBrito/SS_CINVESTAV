@extends('documents::layouts.app')
@section ('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $user ? 'Editar' : 'Agregar' }} Usuario
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li>Administrar</li>
        <li class="active">{{ $user ? 'Editar' : 'Agregar' }} Usuario</li>
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
            <form method="POST" action="{{ $action }}" role="form" enctype="multipart/form-data">
              @csrf
              @if ($user) @method('PUT') @endif

              <div class="box-body">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tipo de usuario</label>
                  <select class="form-control" id="tipo_usuario" name="tipo_usuario" required {{ $user ? 'disabled' : '' }}>
                      @foreach ($userTypes as $userType)
                        <option value="{{ $userType->id }}" {{ optional(optional($user)->tipoUsuario)->id == $userType->id ? 'selected' : '' }}>{{ $userType->nombre }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtnombre">Nombre(s)</label>
                  <input class="form-control" type="text" name="nombre" maxlegth="30" id="nombre" value="{{ old('nombre', optional($user)->nombre) }}" required>
                </div>

                <div class="form-group">
                  <label for="txtappat">Apellido paterno</label>
                  <input class="form-control" type="text" id="a_paterno" maxlegth="20" name="a_paterno" value="{{ old('a_paterno', optional($user)->a_paterno) }}" required>
                </div>

                <div class="form-group">
                  <label for="txtapmat">Apellido materno</label>
                  <input class="form-control" type="text" id="a_materno" maxlegth="20" name="a_materno" value="{{ old('a_materno', optional($user)->a_materno) }}" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="fecha_nacimiento">Fecha de nacimiento</label>
                  <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required readonly value="{{ old('fecha_nacimiento', optional($user)->fecha_nacimiento) }}">
                </div>

                <div class="form-group">
                  <label>Sexo</label>
                  <select class="form-control" required id="sexo" name="sexo">
                      <option value="Hombre" @if(optional($user)->sexo == 'Hombre') selected @endif>Hombre</option>
                      <option value="Mujer" @if(optional($user)->sexo == 'Mujer') selected @endif>Mujer</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtnumero">Celular</label>
                  <input class="form-control" type="text" pattern="[0-9]{10}" id="celular" name="celular" value="{{ old('celular', optional($user)->celular) }}" name="celular" maxlength="10" placeholder="5512345678">
                </div>

                <div class="form-group">
                    <div class="form-group has-feedback">
                      <label for="txtcorreo">Correo electrónico</label>
                      <input type="email" required class="form-control" value="{{ old('email', optional($user)->email) }}" name="email" id="email" placeholder="ejemplo@email.com" required>
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                  <p><img src="{{ auth()->user()->imagen }}" widht="80px" height="80px" alt="Foto de perfil"></p>
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
                            @if ($user)
                              @forelse($user->detalleNiveles as $detalle)
                                <tr id="detail-{{ $detalle->id }}">
                                  <td>{{ $detalle->nivel->grado }}</td>
                                  <td>{{ $detalle->escuela }}</td>
                                  <td>{{ $detalle->carrera }}</td>
                                  <td>{{ $detalle->fecha_inicio }}</td>
                                  <td>{{ $detalle->fecha_fin }}</td>
                                  <td>{{ $detalle->estatus }}</td>
                                  <td>
                                    <div class="btn-group form-inline">
                                      <a class="btn btn-danger btn-sm" data-id="{{ $detalle->id }}">
                                        <i class="glyphicon glyphicon-trash"></i>
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                              @empty
                                <tr>
                                    <td colspan="7" class="text-center">No hay grados de estudios</td>
                                </tr>
                              @endforelse
                            @endif
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

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
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Usuarios</h3>
          <a class="btn btn-primary" href="{{ route('users.create') }}" title="Agregar">
            <i class="fa fa-plus"></i> Agregar
          </a>
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
                      <table id="tblUsuarios" class="table table-hover table-striped">
                        <thead>
                          <tr role="row">
                            <th>Tipo de usuario</th>
                            <th>Nombre(s)</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Fecha de nacimiento</th>
                            <th>Sexo</th>
                            <th>Teléfono</th>
                            <th>Correo electrónico</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr role="row" class="odd" id="row-{{ $user->id }}">
                            <td class="sorting_1">{{ $user->tipoUsuario->nombre }}</td>
                            <td>{{ $user->nombre }}</td>
                            <td>{{ $user->a_paterno }}</td>
                            <td>{{ $user->a_materno }}</td>
                            <td>{{ $user->fecha_nacimiento }}</td>
                            <td>{{ $user->sexo }}</td>
                            <td>{{ $user->celular ?: '---' }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                              <div class="btn-group form-inline">
                                <a class="btn btn-sm btn-warning" href="{{ route('users.edit', auth()->user()) }}" title="Editar">
                                  <i class="fa fa-pencil"></i>
                                </a>
                              </div>
                              <div class="btn-group form-inline">
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-url="{{ route('users.destroy', $user) }}" data-el="#row-{{ $user->id }}">
                                  <i class="fa fa-trash"></i>
                                </button>
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
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection

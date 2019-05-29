@extends('documents::layouts.app')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de Grupos
    <small>Aquí se muestran todos los grupos del sistema</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li>Administrar</li>
    <li class="active">Grupos</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Grupos</h3>
        </div>
        <form role="form">
          <div class="box-body">
            <div class="col-md-12">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="box-body table-responsive no-padding">
                      <table id="tblGrupos" class="table table-hover table-striped">
                        <thead>
                          <tr role="row">
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Profesor</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($groups as $group)
                          <tr role="row" class="odd" id="row-{{ $group->id }}">
                            <td>{{ $group->nombre }}</td>
                            <td>{{ $group->descripcion }}</td>
                            <td>{{ optional($group->profesor)->nombre_completo ?: '---' }}</td>
                            <td>
                              <div class="btn-group form-inline">
                                <a class="btn btn-sm btn-warning" href="{{ route('groups.edit', $group) }}" title="Editar">
                                  <i class="fa fa-pencil"></i>
                                </a>
                              </div>
                              <div class="btn-group form-inline">
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-url="{{ route('groups.destroy', $group) }}" data-el="#row-{{ $group->id }}">
                                  <i class="fa fa-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="5" class="text-center">No hay grupos.</td>
                          </tr>
                          @endforelse
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

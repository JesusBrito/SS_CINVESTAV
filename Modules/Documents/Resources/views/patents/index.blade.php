@extends('documents::layouts.app')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listado de Patentes
    <small>Aquí se muestran todos los patentes del sistema</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li>Administrar</li>
    <li class="active">Patentes</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Patentes</h3>
          <a class="btn btn-primary" href="{{ route('patents.create') }}" title="Agregar">
            <i class="fa fa-plus"></i> Agregar
          </a>
        </div>
        <form role="form">
          <div class="box-body">
            <div class="col-md-12">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="box-body table-responsive no-padding">
                      <table id="tblPatentes" class="table table-hover table-striped">
                        <thead>
                          <tr role="row">
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($patents as $patent)
                          <tr role="row" class="odd" id="row-{{ $patent->id }}">
                            <td>{{ $patent->nombre }}</td>
                            <td>{{ $patent->descripcion }}</td>
                            <td>
                              <div class="btn-group form-inline">
                                <a class="btn btn-sm btn-warning" href="{{ route('patents.edit', $patent) }}" title="Editar">
                                  <i class="fa fa-pencil"></i>
                                </a>
                              </div>
                              <div class="btn-group form-inline">
                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-url="{{ route('patents.destroy', $patent) }}" data-el="#row-{{ $patent->id }}">
                                  <i class="fa fa-trash"></i>
                                </button>
                              </div>
                              <div class="btn-group form-inline">
                                <a type="button" class="btn btn-sm btn-info" title="Ver documento" target="_blank" href="{{ $patent->documento }}">
                                  <i class="fa fa-file"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="5" class="text-center">No hay patentes</td>
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

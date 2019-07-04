@extends('documents::layouts.app')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{ $conferencia ? 'Editar' : 'Agregar' }} Conferencia
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li>Administrar</li>
    <li class="active">{{ $conferencia ? 'Editar' : 'Agregar' }} Conferencia</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Llene los siguientes campos</h3>
        </div>
        <div class="box-body">
          <form method="POST" action="{{ $action }}" role="form" enctype="multipart/form-data">
            @csrf
            @if ($conferencia) @method('PUT') @endif

            <div class="col-md-12">
              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', optional($conferencia)->nombre) }}" required>
                {!! $errors->first('nombre', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="nombre">Conferencia</label>
                <select class="form-control">
                    <option value="">Seleccione una opción</option>
                </select>
                {!! $errors->first('nombre', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="nombre">Tipo</label>
                <select class="form-control">
                    <option value="">Seleccione una opción</option>
                </select>
                {!! $errors->first('nombre', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="nombre">Fecha</label>
                <input class="form-control" type="date" name="nombre" id="nombre" value="{{ old('nombre', optional($conferencia)->nombre) }}" required>
                {!! $errors->first('nombre', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="nombre">Tipo de participación</label>
                <select class="form-control">
                    <option value="">Seleccione una opción</option>
                </select>
                {!! $errors->first('nombre', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="nombre">Nombre del orador <small>(En caso de no haber sido el orador)</small></label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', optional($conferencia)->nombre) }}" required>
                {!! $errors->first('nombre', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="nombre">Documento</label>
                <input class="form-control" type="file" name="nombre" id="nombre" value="{{ old('nombre', optional($conferencia)->nombre) }}" required>
                {!! $errors->first('nombre', '<small class="help-block">:message</small>') !!}
              </div>

              <button type="submit" class="btn btn-primary pull-right" id="btnSave" name="btnSave">
                <i class="glyphicon glyphicon-ok"></i> Guardar
              </button>
            </div>
          </form>
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
@endpush

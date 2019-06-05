@extends('documents::layouts.app')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{ $patent ? 'Editar' : 'Agregar' }} Patente
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li>Administrar</li>
    <li class="active">{{ $patent ? 'Editar' : 'Agregar' }} Patente</li>
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
            @if ($patent) @method('PUT') @endif

            <div class="col-md-12">
              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', optional($patent)->nombre) }}" required>
                {!! $errors->first('nombre', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('pais', 'has-error') }}">
                <label for="pais">País</label>
                <input class="form-control" type="text" name="pais" id="pais" value="{{ old('pais', optional($patent)->pais) }}" required>
                {!! $errors->first('pais', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('fecha_solicitud', 'has-error') }}">
                <label for="fecha_solicitud">Fecha de solicitud</label>
                <input class="form-control fecha" type="text" name="fecha_solicitud" id="fecha_solicitud" value="{{ old('fecha_solicitud', optional($patent)->fecha_solicitud) }}" required>
                {!! $errors->first('fecha_solicitud', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('fecha_registro', 'has-error') }}">
                <label for="fecha_registro">Fecha de registro</label>
                <input class="form-control fecha" type="text" name="fecha_registro" id="fecha_registro" value="{{ old('fecha_registro', optional($patent)->fecha_registro) }}" required>
                {!! $errors->first('fecha_registro', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('fecha_expiracion', 'has-error') }}">
                <label for="fecha_expiracion">Fecha de expiración</label>
                <input class="form-control fecha" type="text" name="fecha_expiracion" id="fecha_expiracion" value="{{ old('fecha_expiracion', optional($patent)->fecha_expiracion) }}" required>
                {!! $errors->first('fecha_expiracion', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('numero', 'has-error') }}">
                <label for="numero">Número</label>
                <input class="form-control" type="text" name="numero" id="numero" value="{{ old('numero', optional($patent)->numero) }}" required>
                {!! $errors->first('numero', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('descripcion', 'has-error') }}">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', optional($patent)->descripcion) }}</textarea>
                {!! $errors->first('descripcion', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {{ $errors->first('documento', 'has-error') }}">
                <label for="documento">Documento</label>
                @if (optional($patent)->documento)
                  <p><a href="{{ optional($patent)->documento }}" target="_blank">Ver documento</a></p>
                @endif
                <input type="file" id="documento" name="documento" accept="pdf" />
                <p class="help-block">Suba un archivo PDF</p>
                {!! $errors->first('documento', '<small class="help-block">:message</small>') !!}
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

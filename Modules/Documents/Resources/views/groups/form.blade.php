@extends('documents::layouts.app')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{ $group ? 'Editar' : 'Agregar' }} Grupo
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li>Administrar</li>
    <li class="active">{{ $group ? 'Editar' : 'Agregar' }} Grupo</li>
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
            @if ($group) @method('PUT') @endif

            <div class="col-md-12">
              <div class="form-group {{ $errors->first('nombre', 'has-error') }}">
                <label for="txtnombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', optional($group)->nombre) }}" required>
                {!! $errors->first('nombre', '<strong>:message</strong>') !!}
              </div>

              <div class="form-group {{ $errors->first('descripcion', 'has-error') }}">
                <label for="txtappat">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', optional($group)->descripcion) }}</textarea>
                {!! $errors->first('descripcion', '<strong>:message</strong>') !!}
            </div>

              <div class="form-group {{ $errors->first('id_profesor', 'has-error') }}">
                <label>Tipo de usuario</label>
                <select class="form-control" id="id_profesor" name="id_profesor" required>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ optional(optional($group)->profesor)->id == $user->id ? 'selected' : '' }}>{{ $user->nombre_completo }}</option>
                  @endforeach
                </select>
                {!! $errors->first('id_profesor', '<strong>:message</strong>') !!}
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
  <script src="{{ asset('js/users.js') }}"></script>
  <script>
    let urlLevelDetails = '{{ route('level-details.index') }}'
  </script>
@endpush

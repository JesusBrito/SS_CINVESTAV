@extends('documents::layouts.app')
@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $publication ? 'Editar' : 'Agregar' }} Publicación
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li>Administrar</li>
            <li class="active">{{ $publication ? 'Editar' : 'Agregar' }} Publicación</li>
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
                            @if ($publication) @method('PUT') @endif

                            <div class="col-md-12">
                                <div class="form-group {{ $errors->first('type', 'has-error') }}">
                                    <label for="txttype">Tipo de Publicación</label>
                                    <input class="form-control" type="text" name="type" id="type" value="{{ old('type', optional($publication)->type) }}" required>
                                    {!! $errors->first('type', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group {{ $errors->first('title', 'has-error') }}">
                                    <label for="txtTitulo">Titulo</label>
                                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', optional($publication)->title) }}" required>
                                    {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group {{ $errors->first('publisher', 'has-error') }}">
                                    <label for="txtPublicador">Publicador</label>
                                    <input class="form-control" type="text" name="publisher" id="publisher" value="{{ old('publisher', optional($publication)->publisher) }}" required>
                                    {!! $errors->first('publisher', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group {{ $errors->first('country', 'has-error') }}">
                                    <label for="txtCiudad">Ciudad</label>
                                    <input class="form-control" type="text" name="country" id="country" value="{{ old('country', optional($publication)->country) }}" required>
                                    {!! $errors->first('country', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group {{ $errors->first('editorial', 'has-error') }}">
                                    <label for="txtEditorial">Editorial</label>
                                    <input class="form-control" type="text" name="editorial" id="editorial" value="{{ old('editorial', optional($publication)->editorial) }}" required>
                                    {!! $errors->first('editorial', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group {{ $errors->first('description', 'has-error') }}">
                                    <label for="txtDescripcion">Descripción</label>
                                    <textarea class="form-control" type="text" name="description" id="description" required>{{ old('description', optional($publication)->description) }}</textarea>
                                    {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                                </div>

                                <div class="form-group {{ $errors->first('document', 'has-error') }}">
                                    <label for="documento">Documento</label>
                                    @if (optional($publication)->document)
                                        <p><a href="{{ optional($publication)->document }}" target="_blank">Ver documento</a></p>
                                    @endif
                                    <input type="file" id="document" name="document" accept="pdf" />
                                    <p class="help-block">Suba un archivo PDF</p>
                                    {!! $errors->first('document', '<small class="help-block">:message</small>') !!}
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

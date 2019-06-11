@extends('documents::layouts.app')
@section ('content')
    <section class="content-header">
        <h1>
            Listado de Publicaciones
            <small>Aquí se muestran todas las publicaciones</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li>Administrar</li>
            <li class="active">Publicaciones</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Publicaciones</h3>
                        <a class="btn btn-primary" href="{{ route('publications.create') }}" title="Agregar">
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
                                                <table id="tblGrupos" class="table table-hover table-striped">
                                                    <thead>
                                                    <tr role="row">
                                                        <th>Tipo de publicación</th>
                                                        <th>Título</th>
                                                        <th>Fecha de publicación</th>
                                                        <th>Publicador</th>
                                                        <th>País</th>
                                                        <th>Editorial</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($publications as $publication)
                                                        <tr role="row" class="odd" id="row-{{ $publication->id }}">
                                                            <td>{{ $publication->type }}</td>
                                                            <td>{{ $publication->title }}</td>
                                                            <td>{{ $publication->created_at }}</td>
                                                            <td>{{ $publication->publisher }}</td>
                                                            <td>{{ $publication->country }}</td>
                                                            <td>{{ $publication->editorial }}</td>
                                                            <td>
                                                                <div class="btn-group form-inline">
                                                                    <a class="btn btn-sm btn-warning" href="{{ route('publications.edit', $publication) }}" title="Editar">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="btn-group form-inline">
                                                                    <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-url="{{ route('publications.destroy', $publication) }}" data-el="#row-{{ $publication->id }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="btn-group form-inline">
                                                                    <a type="button" class="btn btn-sm btn-info" title="Ver documento" target="_blank" href="{{ $publication->document }}">
                                                                        <i class="fa fa-file"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8" class="text-center">No hay Publicaciones.</td>
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

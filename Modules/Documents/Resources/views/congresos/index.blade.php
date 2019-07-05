@extends('documents::layouts.app')
@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Listado de Congresos
            <small>Aquí se muestran todos los grupos del sistema</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li>Administrar</li>
            <li class="active">Congresos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Congresos</h3>
                        <a class="btn btn-primary" href="{{ route('congresos.create') }}" title="Agregar">
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
                                                <table id="tblConferencias" class="table table-hover table-striped">
                                                    <thead>
                                                    <tr role="row">
                                                        <th>Nombre</th>
                                                        <th>Edición</th>
                                                        <th>Fecha Inicio</th>
                                                        <th>Fecha Fin</th>
                                                        <th>Pais</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr role="row" class="odd" >
                                                        <td>Tendencias</td>
                                                        <td>2020</td>
                                                        <td>10/08/2019</td>
                                                        <td>15/08/19</td>
                                                        <td>México</td>
                                                        <td>CDMX</td>
                                                        <td>
                                                            <div class="btn-group form-inline">
                                                                <a class="btn btn-sm btn-warning" href="" title="Editar">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            </div>
                                                            <div class="btn-group form-inline">
                                                                <button type="button" class="btn btn-sm btn-danger" title="Eliminar">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group form-inline">
                                                                <a class="btn btn-sm btn-info" href="" title="Alumnos">
                                                                    <i class="fa fa-file"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>

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

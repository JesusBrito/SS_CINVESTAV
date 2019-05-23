@extends('inventory::layouts.master')

@section('main_container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Agregar tipo de desecho
          <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
          <li class="active">Here</li>
        </ol>
      </section>
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
                  <form class="form-horizontal" method="POST" action="{{ route('wastes.store') }}">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label class="control-label col-xs-2">Categoría:</label>
                            <div class="col-xs-4">
                              <input type="text" required class="form-control" name="txtCategoria"  placeholder="Categoría">
                            </div>
                            <label class="control-label col-xs-2">Horario:</label>
                            <div class="col-xs-4">
                              <input type="time" required class="form-control" name="txtHorario"  placeholder="Horario">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-xs-2">Tipo:</label>
                            <div class="col-xs-4">
                              <input type="text" required class="form-control" name="txtTipo"  placeholder="Tipo">
                            </div>
                            <label class="control-label col-xs-2">Recipiente:</label>
                            <div class="col-xs-4">
                              <input type="text" required class="form-control" name="txtRecipiente"  placeholder="Recipiente">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-xs-2">Procedimiento:</label>
                            <div class="col-xs-4">
                              <textarea required class="form-control" rows="8" name="txtProcedimiento"  placeholder="Procedimiento"></textarea>
                            </div>
                            <label class="control-label col-xs-2">Equipo de Seguridad:</label>
                            <div class="col-xs-4">
                              <label><input class="custom-control-label" type="radio" name="opt1"> Guantes</label><br><br>
                              <label><input class="custom-control-label" type="radio" name="opt1"> Bata</label><br><br>
                              <label><input class="custom-control-label" type="radio" name="opt1"> Gogles</label><br><br>
                              <label><input class="custom-control-label" type="radio" name="opt1"> Cubreboca</label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                          <div class="col-md-2 col-md-offset-10  col-sm-2 col-sm-offset-10 col-xs-2 col-xs-offset-10">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </section>
@stop

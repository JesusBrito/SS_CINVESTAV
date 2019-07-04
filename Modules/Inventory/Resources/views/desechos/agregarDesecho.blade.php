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
                              <select class="form-control">
                                <option disabled select value="0">Seleccionar</option>
                                <option value="1">Biológicos</option>
                                <option value="2">Químicos</option>
                                <option value="3">Radioactivos</option>
                                <option value="3">Punzo Cortantes</option>
                                <option value="4">Otro</option>
                              </select>
                            </div>

                            <label class="control-label col-xs-2">Horario:</label>
                            <div class="col-xs-4">
                              <input type="time" required class="form-control" name="txtHorario"  placeholder="Horario">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-xs-2">Procedimiento:</label>
                            <div class="col-xs-4 container-text">
                              <textarea required class="form-control textarea-description" rows="10" name="txtProcedimiento"  placeholder="Procedimiento"></textarea>
                            </div>
                            
                            <label class="control-label col-xs-2">Días de entrega:</label>
                            <div class="weekDays-selector col-xs-4">
                              <input type="checkbox" id="weekday-mon" class="weekday" />
                              <label for="weekday-mon">L</label>
                              <input type="checkbox" id="weekday-tue" class="weekday" />
                              <label for="weekday-tue">M</label>
                              <input type="checkbox" id="weekday-wed" class="weekday" />
                              <label for="weekday-wed">Mx</label>
                              <input type="checkbox" id="weekday-thu" class="weekday" />
                              <label for="weekday-thu">J</label>
                              <input type="checkbox" id="weekday-fri" class="weekday" />
                              <label for="weekday-fri">V</label>
                              <input type="checkbox" id="weekday-sat" class="weekday" />
                              <label for="weekday-sat">S</label>
                              <input type="checkbox" id="weekday-sun" class="weekday" />
                              <label for="weekday-sun">D</label>
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-xs-2">Equipo de Seguridad:</label>
                          <br>
                          <div class="col-xs-4">
                            <label><input class="custom-control-label" type="checkbox" name="opt1"> Guantes</label><br><br>
                            <label><input class="custom-control-label" type="checkbox" name="opt1"> Bata</label><br><br>
                            <label><input class="custom-control-label" type="checkbox" name="opt1"> Googles</label><br><br>
                            <label><input class="custom-control-label" type="checkbox" name="opt1"> Cubreboca</label>
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

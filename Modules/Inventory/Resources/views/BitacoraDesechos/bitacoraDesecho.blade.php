@extends('inventory::layouts.master')

@section('main_container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Bitácora de desechos
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label col-xs-2">Responsable:</label>
                            <div class="col-xs-4">
                              <select class="form-control">
                                <option disabled select value="0">Seleccionar</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->nombre}} {{$user->a_paterno}} {{$user->a_materno}}</option>
                                @endforeach
                              </select>
                            </div>
                            <label class="control-label col-xs-2">Tipo de desecho:</label>
                            <div class="col-xs-4">
                              <select class="form-control">
                                <option disabled select value="0">Seleccionar</option>
                              </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-xs-2">Fecha:</label>
                            <div class="col-xs-4">
                              <input type="date" required class="form-control" name="txtFecha"  placeholder="_/_/__">
                            </div>
                            <label class="control-label col-xs-2">Hora:</label>
                            <div class="col-xs-4">
                              <input type="time" required class="form-control" name="txtHora"  placeholder=" _:_AM/PM">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                          <div>
                            <label class="control-label col-xs-2">Cantidad:</label>
                            <div class="col-sm-2">
                              <input type="number" min=".1" step=".1" required class="form-control" name="txtCantidad"  placeholder="">
                            </div>
                            <div class="col-sm-2">
                              <select class="form-control">
                                <option disabled select value="0">Seleccionar</option>
                                @foreach ($unities as $unity)
                                    <option value="{{$unity->id}}">{{$unity->nombreCorto}}</option>
                                @endforeach
                              </select>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="col-sm">
                              <label class="control-label col-xs-2">Descripción:</label>
                              <div class="col-xs-4 container-text">
                                <textarea rows="8" required class="form-control textarea-description"  name="txtAreaProcedimiento"  placeholder="Descripción"></textarea>
                              </div>
                            </div>
                          </div>
                          <div>
                            <label class="control-label col-xs-2">CRETI:</label>
                            <div class="col-xs-4">
                              <label><input class="custom-control-label" type="radio" name="creti"> Corrosivo</label><br>
                              <label><input class="custom-control-label" type="radio" name="creti"> Reactivo</label><br>
                              <label><input class="custom-control-label" type="radio" name="creti"> Explosivo</label><br>
                              <label><input class="custom-control-label" type="radio" name="creti"> Toxico</label><br>
                              <label><input class="custom-control-label" type="radio" name="creti"> Inflamable</label>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="form-group">
                          <div class="col-md-2 col-md-offset-10  col-sm-2 col-sm-offset-10 col-xs-2 col-xs-offset-10">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                          </div>
                        </div>
                        <br>
                        <div class="col-md-12 table-responsive no-padding">
                          <table id="tableToxicidades" class="table table-striped table-bordered">
                            <thead>
                              <tr class="table-title-edit">
                                <th class="col-md-2">Fecha</th>
                                <th class="col-md-2">Hora</th>
                                <th class="col-md-2">Responsable</th>
                                <th class="col-md-2">Tipo</th>
                                <th class="col-md-2">Cantidad</th>
                                <th class="col-md-4">CRETI</th>
                                <th class="col-md-4">Descripción</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($wastes as $waste)
                                <tr id="fila{{$waste->id}}">
                                  <td class="center-text-column">{{$waste->fecha}}</td>
                                  <td class="center-text-column">{{$waste->hora}}</td>
                                  <td class="center-text-column">{{$waste->id_usuario}}</td>
                                  <td class="center-text-column">{{$waste->idTipoDesecho}}</td>
                                  <td class="center-text-column">{{$waste->cantidad}}</td>
                                  <td class="center-text-column">{{$waste->creti}}</td>
                                  <td class="center-text-column">{{$waste->descripcion}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </section>
@stop

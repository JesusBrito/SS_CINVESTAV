@extends('inventory::layouts.master')

@section('main_container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Agregar consumible
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
                  <form class="form-horizontal" method="POST" action="{{ route('consumables.store') }}">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label class="control-label col-xs-4">Nombre:</label>
                            <div class="col-xs-8">
                              <input type="text" required class="form-control" name="txtNombre" placeholder="Nombre Consumible">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-xs-4">Categoria:</label>
                            <div class="col-xs-8">
                              <select class="form-control" required name="txtCategoria">
                                <option disabled select value="0">Selecciona categoría</option>
                                @foreach ($categoriesConsumable as $categoryConsumable)
                                  <option value="{{$categoryConsumable->id}}">{{$categoryConsumable->categoria}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-xs-4">Existencia:</label>
                            <div class="col-xs-8">
                              <input type="number" min="0" required class="form-control" name="txtExistencia" placeholder="Existencia">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-xs-4">Existencia mínima:</label>
                            <div class="col-xs-8">
                              <input type="number" min="0" required class="form-control" name="txtExistenciaMinima" placeholder="Existencia mínima">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-xs-4">Descripción:</label>
                            <div class="col-xs-8">
                              <textarea class="form-control" required rows="5" name="txtDescripcion" placeholder="Descripción"></textarea>
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
@extends('inventory::layouts.master')

@section('main_container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Listar tipos de reactivos
          <br>
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
                  <h3 class="box-title">A continuación, se muestra una tabla con todos los tipos de reactivos</h3>
                  <br>
                  <br>
                </div>
                  <div class="box-body">
                    <br>
                    <br>
                    <div class="col-md-8 col-md-offset-2 table-responsive no-padding"> 
                      <table id="tableToxicidades" class="table table-striped table-bordered">
                          <thead>
                            <tr class="table-title-edit">
                              <th class="col-md-2">ID</th>
                              <th class="col-md-5">Tipo</th>
                              <th class="col-md-1">Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                              <tr>
                                <td>1</td> 
                                <td class="center-text-column">Tipo 1</td> 
                                <td class="table-button-center">
                                  <a class="btn boton-editar" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit fa-lg"></i></a>
                                  <a class="btn boton-eliminar" onclick=""><i class="fa fa-trash fa-lg"></i></a>
                                </td>
                              </tr>
                              <tr>
                                  <td>2</td> 
                                  <td class="center-text-column">Tipo 2</td> 
                                  <td class="table-button-center">
                                    <a class="btn boton-editar" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit fa-lg"></i></a>
                                    <a class="btn boton-eliminar" onclick=""><i class="fa fa-trash fa-lg"></i></a>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
        </div>
      </section>


      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Editar tipo de reactivo</h4>
            </div>
            <div class="modal-body">


                <form class="form-horizontal" action="">
                    <div>
                      <div class="form-group">
                        <label class="control-label col-xs-4">Tipo de reactivo:</label>
                        <div class="col-xs-8">
                          <input type="text" class="form-control" id="inputEmail" placeholder="Tipo de reactivo">
                        </div>
                      </div>
                      <br>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </div>
        </div>
      </div>
@stop
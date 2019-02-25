@extends('inventory::layouts.master')

@section('main_container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Agregar temperatura
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
                <form class="form-horizontal" action="">
                  <div class="box-body">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label class="control-label col-xs-4">Temperatura:</label>
                            <div class="col-xs-8">
                              <input type="text" class="form-control" id="inputEmail" placeholder="Temperatura">
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
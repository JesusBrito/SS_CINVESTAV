@extends('inventory::layouts.master')

@section('main_container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Listar Proveedores
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
          <h3 class="box-title">A continuación, se muestra una tabla con todos los proveedores</h3>
          <br>
          <br>
        </div>
        <div class="box-body">
          <br>
          <br>
          <div class="col-md-12 table-responsive no-padding">
            <table id="tableToxicidades" class="table table-striped table-bordered">
              <thead>
                <tr class="table-title-edit">
                  <th class="col-md-2">ID</th>
                  <th class="col-md-2">Empresa</th>
                  <th class="col-md-2">Estado</th>
                  <th class="col-md-2">Dirección</th>
                  <th class="col-md-3">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($providers as $provider)
                <tr id="fila{{$provider->id}}">
                  <td>{{$provider->id}}</td>
                  <td class="center-text-column" id="nombreEmpresa{{$provider->id}}">{{$provider->nombreEmpresa}}</td>
                  <td class="center-text-column" id="estatus{{$provider->id}}">@if($provider->estado == 1) Habilidado
                    @else Deshabilitado @endif</td>
                  <!--<td class="center-text-column" id="direccion{{$provider->id}}">{{$provider->calle}},{{$provider->alcMun}}</td> -->
                  <td class="center-text-column" id="calle{{$provider->id}}">{{$provider->calle}}</td>

                  <td class="table-button-center">
                    <a class="btn boton-editar openModalEdit" data-id="{{$provider->id}}"
                      data-name="{{$provider->nombreEmpresa}}"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn boton-deshabilitar" id="btn-des{{$provider->id}}"
                      onclick="cambiarEstatusProveedor({{$provider->id}})"> @if($provider->estado == 1) <i
                        class="fa fa-eye-slash fa-lg" aria-hidden="true"></i>@else <i class="fa fa-eye fa-lg"
                        aria-hidden="true"></i> @endif </a>
                    <a class="btn boton-eliminar" onclick="eliminarProveedor({{$provider->id}})"><i
                        class="fa fa-trash fa-lg"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Proveedor</h4>
      </div>
      <div class="modal-body">


        <form class="form-horizontal" action="">
          <input name="_token" value="{{ csrf_token() }}" type="hidden">
          <input name="_asset" value="{{ url('/') }}" type="hidden">
          <div>
            <div class="form-group">
              <label class="control-label col-xs-4">Id del proveedor:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" readonly id="inputIdProveedor" placeholder="Id">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-4">Empresa:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="inputEmpresa" placeholder="Empresa">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-xs-4">Calle:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="inputCalle" placeholder="Calle">
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-xs-4">Colonia:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="inputColonia" placeholder="Colonia">
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-xs-4">Número Exterior:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="inputNExt" placeholder="Número exterior">
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-xs-4">Número Interior:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="inputNInt" placeholder="Número interior">
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-xs-4">Alcaldia O Municipio:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="inputAlcaldiaMunicipio" placeholder="Alcaldia o Municipio">
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-xs-4">Estado:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="inputEstado" placeholder="Estado">
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label col-xs-4">CP:</label>
              <div class="col-xs-8">
                <input type="text" class="form-control" id="inputCP" placeholder="Codigo Postal">
              </div>
            </div>
            <br>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="editarProveedor()" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

@push ('scripts')
<script>
  var _token = $('input[name="_token"]').val()
      var urlImport = $('input[name="_asset"]').val()

     
      $(".openModalEdit").click(function () {
        var id = $(this).attr('data-id')
        $('#inputEmpresa').val($('#nombreEmpresa'+id).html());
        $('#inputCalle').val($('#calle'+id).html());
        $('#inputIdProveedor').val(id);
        $('#modalEdit').modal('show');
      });

      function editarProveedor(){

        var id = $('#inputIdProveedor').val()
        var txtEmpresa = $('#inputEmpresa').val().trim()
        var txtCalle = $('#inputCalle').val().trim()
        var txtColonia = $('#inputColonia').val().trim()
        var txtNumeroExt = $('#inputNExt').val().trim()
        var txtNumeroInt = $('#inputNInt').val().trim()
        var txtAlcaldia = $('#inputAlcaldiaMunicipio').val().trim()
        var txtEstado = $('#inputEstado').val().trim()
        var txtCP = $('#inputCP').val().trim()
        

        if(!(txtEmpresa.length > 0)){
          swal('¡Error!','No se puede enviar el campo vacío','error');
        }
        else{ 
          swal({
              title: 'Guardar cambios',
              text: "¿Estás seguro?",
              type: 'warning',
              buttons: [
                'No, cancelar',
                'Si, Estoy seguro'
              ],
              dangerMode: true
            }).then(function (isConfirm) {
              if (isConfirm) {
                // código que elimina
                $.ajax({
                    type: "PUT",
                    url: urlImport+"/inventory/providers/"+id,
                    dataType: "json",
                    data: {
                        "_token": _token,
                        "nombreEmpresa": txtEmpresa,
                        "calle" : txtCalle,
                        "colonia" : txtColonia,
                        "numExterior" : txtNumeroExt,
                        "numInterior": txtNumeroInt,
                        "alcMun": txtAlcaldia,
                        "estadoRep": txtEstado,
                        "cp":  txtCP,
                        "txtIdProveedor": id
                    }
                    }).done(function(resp){
                        swal('Ok','Se editó correctamente el registro','info');
                        $('#nombreEmpresa'+id).html(txtEmpresa)
                        $('#calle'+id).html(txtCalle)
                    }).fail(function(err) {
                        swal('¡Error!','No se pudo modificar el registro','error');
                    }).error(function(data) {
                    swal('¡Error!', 'No se pudo modificar el registro', "error");
                })
              }else{
                swal('Cancelado','No se han realizado cambios','error')
              }
            })
        }
      }

      function cambiarEstatusProveedor(id){
        if($('#estatus'+id).html().trim()=="Habilidado"){
          var txtEstatusTemperatura = "Deshabilidado"
        }else{
          var txtEstatusTemperatura = "Habilidado"
        }
        $.ajax({
          type: "PUT",
          url: urlImport+"/inventory/temperature/change-status",
          dataType: "json",
          data: {
            "_token": _token,
            "txtIdTemperatura": id
          }
        }).done(function(resp){
          swal('Ok','Es estatus se modificó correctamente','info');
          $('#estatus'+id).html(txtEstatusTemperatura)
          if($('#estatus'+id).html().trim()=="Habilidado"){
            $('#btn-des'+id).html('<i class="fa fa-eye-slash fa-lg" aria-hidden="true"></i>')
          }else{
            $('#btn-des'+id).html('<i class="fa fa-eye fa-lg" aria-hidden="true"></i> ')
          }

        }).fail(function(err) {
          swal('¡Error!','No se pudo modificar el estatus','error');
                 
        })
      }

      function eliminarProveedor(id){
        swal({
            title: '¿Estás seguro?',
            text: "¡No se podrán deshacer los cambios!",
            type: 'warning',
            buttons: [
              'No, cancelar',
              'Si, Estoy seguro'
            ],
            dangerMode: true
          }).then(function (isConfirm) {
            if (isConfirm) {
              // código que elimina
              $.ajax({
                  type: "DELETE",
                  url: urlImport+"/inventory/temperatures/"+id,
                  dataType: "json",
                  data: {
                      "_token": _token,
                  }
                  }).done(function(resp){
                      swal('Eliminado','Se eliminó correctamente','info');
                      $('#tableToxicidades').DataTable().row("#fila"+id).remove().draw();
                  }).fail(function(err) {
                      swal('¡Error!','Error al eliminar el registro','error');
                  })
            }else{
              swal('Cancelado','No se han realizado cambios','error')
            }
          })
      }


</script>
@endpush
@stop
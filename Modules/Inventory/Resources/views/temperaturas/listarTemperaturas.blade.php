@extends('inventory::layouts.master')

@section('main_container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Listar temperaturas   
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
                  <h3 class="box-title">A continuación, se muestra una tabla con todas las temperaturas</h3>
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
                              <th class="col-md-2">Id</th>
                              <th class="col-md-2">Temperatura</th>
                              <th class="col-md-3">Unidad</th>
                              <th class="col-md-2">Estatus</th>
                              <th class="col-md-3">Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($temperatures as $temperature)
                              <tr id="fila{{$temperature->id}}">
                                <td>{{$temperature->id}}</td> 
                                <td class="center-text-column" id="nombre{{$temperature->id}}">{{$temperature->temperatura}}</td> 
                                <td class="center-text-column" id="unidad{{$temperature->id}}">{{$temperature->unity->nombreLargo}} - {{$temperature->unity->nombreCorto}}</td> 

                                

                                <td class="center-text-column" id="estatus{{$temperature->id}}">@if($temperature->estado == 1) Habilidado @else Deshabilitado @endif</td> 
                                <td class="table-button-center">
                                  <a class="btn boton-editar openModalEdit" data-id="{{$temperature->id}}" data-name="{{$temperature->temperatura}}"><i class="fa fa-edit fa-lg"></i></a>
                                  <a class="btn boton-deshabilitar" id="btn-des{{$temperature->id}}" onclick="cambiarEstatusTemperatura({{$temperature->id}})"> @if($temperature->estado == 1) <i class="fa fa-eye-slash fa-lg" aria-hidden="true"></i>@else <i class="fa fa-eye fa-lg" aria-hidden="true"></i> @endif </a>
                                  <a class="btn boton-eliminar" onclick="eliminarTemperatura({{$temperature->id}})"><i class="fa fa-trash fa-lg"></i></a>
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
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Editar temperatura</h4>
            </div>
            <div class="modal-body">


                <form class="form-horizontal" action="">
                  <input name="_token" value="{{ csrf_token() }}" type="hidden">
                  <input name="_asset" value="{{ url('/') }}" type="hidden">
                    <div>
                      <div class="form-group">
                        <label class="control-label col-xs-4">Id de la temperatura:</label>
                        <div class="col-xs-8">
                          <input type="text" class="form-control" readonly id="inputIdTemperatura" placeholder="Id">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-xs-4">Temperatura:</label>
                        <div class="col-xs-8">
                          <input type="text" class="form-control" id="inputTemperatura" placeholder="Temperatura">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-xs-4">Unidad:</label>
                        <div class="col-xs-8">
                          <select class="form-control" id="inputUnidad" name="txtUnidad">
                            <option disabled select value="0">Seleccionar</option>
                            @foreach ($unities as $unity)
                                <option  value="{{$unity->id}}">{{$unity->nombreLargo}} - {{$unity->nombreCorto}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                      <br>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" onclick="editarTemperatura()" class="btn btn-primary">Guardar Cambios</button>
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
        $('#inputTemperatura').val($('#nombre'+id).html());
        $('#inputUnidad').val($('#unidad'+id).html());
        $('#inputUnidad option').each(function() {
            if($(this).text()==$('#unidad'+id).html())
              $(this).prop("selected", true)
            
        });
        $('#inputIdTemperatura').val(id);
        $('#modalEdit').modal('show');
      });

      function editarTemperatura(){
        var id = $('#inputIdTemperatura').val()
        var txtTemperatura = $('#inputTemperatura').val().trim()
        var txtUnidad = $('#inputUnidad option:selected').val().trim()
        var txtUnidadToShow = $('#inputUnidad option:selected').text().trim()

        if(!(txtTemperatura.length > 0)){
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
                    url: urlImport+"/inventory/temperatures/"+id,
                    dataType: "json",
                    data: {
                        "_token": _token,
                        "txtTemperatura": txtTemperatura,
                        "txtUnidad" : txtUnidad,
                        "txtIdTemperatura": id
                    }
                    }).done(function(resp){
                        swal('Ok','Se editó correctamente el registro','info');
                        $('#nombre'+id).html(txtTemperatura)
                        $('#unidad'+id).html(txtUnidadToShow)
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

      function cambiarEstatusTemperatura(id){
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

      function eliminarTemperatura(id){
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
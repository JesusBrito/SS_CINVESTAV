@extends('inventory::layouts.master')

@section('main_container')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Listar toxicidades
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
                  <h3 class="box-title">A continuación, se muestra una tabla con todos los registros de toxicidades</h3>
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
                              <th class="col-md-5">Toxicidad</th>
                              <th class="col-md-2">Estatus</th>
                              <th class="col-md-3">Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($toxicities as $toxicity)
                              <tr id="fila{{$toxicity->id}}">
                                <td>{{$toxicity->id}}</td> 
                                <td class="center-text-column" id="nombre{{$toxicity->id}}">{{$toxicity->toxicidad}}</td> 
                                <td class="center-text-column" id="estatus{{$toxicity->id}}">@if($toxicity->estado == 1) Habilidado @else Deshabilitado @endif</td> 
                                <td class="table-button-center">
                                  <a class="btn boton-editar openModalEdit" data-id="{{$toxicity->id}}" data-name="{{$toxicity->toxicidad}}"><i class="fa fa-edit fa-lg"></i></a>
                                  <a class="btn boton-deshabilitar" id="btn-des{{$toxicity->id}}" onclick="cambiarEstatusToxicidad({{$toxicity->id}})"> @if($toxicity->estado == 1) <i class="fa fa-eye-slash fa-lg" aria-hidden="true"></i>@else <i class="fa fa-eye fa-lg" aria-hidden="true"></i> @endif </a>
                                  <a class="btn boton-eliminar" onclick="eliminarToxicidad({{$toxicity->id}})"><i class="fa fa-trash fa-lg"></i></a>
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
              <h4 class="modal-title" id="myModalLabel">Editar tipo de reactivo</h4>
            </div>
            <div class="modal-body">


                <form class="form-horizontal" action="">
                  <input name="_token" value="{{ csrf_token() }}" type="hidden">
                  <input name="_asset" value="{{ url('/') }}" type="hidden">
                    <div>
                      <div class="form-group">
                        <label class="control-label col-xs-4">Id de la toxicidad:</label>
                        <div class="col-xs-8">
                          <input type="text" class="form-control" readonly id="inputIdToxicidad" placeholder="Toxicidad">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-xs-4">Nombre de la toxicidad:</label>
                        <div class="col-xs-8">
                          <input type="text" class="form-control" id="inputToxicidad" placeholder="Toxicidad">
                        </div>
                      </div>
                      <br>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" onclick="editarToxicidad()" class="btn btn-primary">Guardar Cambios</button>
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
        $('#inputToxicidad').val($('#nombre'+id).html());
        $('#inputIdToxicidad').val(id);
        $('#modalEdit').modal('show');
      });

      function editarToxicidad(){
        var id = $('#inputIdToxicidad').val()
        var txtToxicidad = $('#inputToxicidad').val().trim()
        
        if(!(txtToxicidad.length > 0)){
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
                    url: urlImport+"/inventory/toxicities/"+id,
                    dataType: "json",
                    data: {
                        "_token": _token,
                        "txtToxicidad": txtToxicidad,
                        "txtIdToxicidad": id
                    }
                    }).done(function(resp){
                        swal('Ok','Se editó correctamente el registro','info');
                        $('#nombre'+id).html(txtToxicidad)
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

      function cambiarEstatusToxicidad(id){
        if($('#estatus'+id).html().trim()=="Habilidado"){
          var txtEstatusToxicidad = "Deshabilidado"
        }else{
          var txtEstatusToxicidad = "Habilidado"
        }
        $.ajax({
          type: "PUT",
          url: urlImport+"/inventory/toxicity/change-status",
          dataType: "json",
          data: {
            "_token": _token,
            "txtIdToxicidad": id
          }
        }).done(function(resp){
          swal('Ok','Es estatus se modificó correctamente','info');
          $('#estatus'+id).html(txtEstatusToxicidad)
          if($('#estatus'+id).html().trim()=="Habilidado"){
            $('#btn-des'+id).html('<i class="fa fa-eye-slash fa-lg" aria-hidden="true"></i>')
          }else{
            $('#btn-des'+id).html('<i class="fa fa-eye fa-lg" aria-hidden="true"></i> ')
          }

        }).fail(function(err) {
          swal('¡Error!','No se pudo modificar el estatus','error');
                 
        })
      }

      function eliminarToxicidad(id){
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
                  url: urlImport+"/inventory/typeReactives/"+id,
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
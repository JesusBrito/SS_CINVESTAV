@extends('inventory::layouts.master')

@section('main_container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Agregar proveedor
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/inventory') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li class="active"> Agregar proveedor</li>
  </ol>
</section>
<!-- Main content -->
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
        <form method="POST" action="" role="form" enctype="multipart/form-data" id="userForm">
          @csrf
          <div class="box-body">
            <div class="col-md-6">

              <div class="form-group">
                <label>Nombre de la empresa</label>
                <input type="text" required class="form-control" name="txtNombre" placeholder="Nombre de la empresa">
              </div>

              <div class="form-group">
                <label>Calle:</label>
                <input type="text" required class="form-control" name="txtCalle" placeholder="Calle">
              </div>

              <div class="form-group">
                <label>Número exterior:</label>
                <input type="text" required class="form-control" name="txtNumeroExterior" placeholder="Número exterior">
              </div>

              <div class="form-group">
                <label>Número interior:</label>
                <input type="text" required class="form-control" name="txtNumeroInterior" placeholder="Número interior">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Código postal:</label>
                <input type="text" maxlength="5" required class="form-control" id="txtCp" name="txtCp"
                  placeholder="Código postal">
              </div>

              <div class="form-group">
                <label>Colonia:</label>
                <select class="form-control" id="txtColonia" name="txtColonia">
                  <option disabled select value="0">Seleccionar</option>
                </select>
              </div>

              <div class="form-group">
                <label>Municipio:</label>
                <input type="text" required class="form-control" id="txtMunicipio" name="txtMunicipio" disabled
                  placeholder="Municipio">
              </div>

              <div class="form-group">
                <label>Estado:</label>
                <input type="text" required class="form-control" id="txtEstado" name="txtEstado" disabled
                  placeholder="Estado">
              </div>

              <button type="submit" class="btn btn-primary pull-right" id="btnSave" name="btnSave">
                <i class="glyphicon glyphicon-ok"></i> Guardar
              </button>
              <br>
              <br>
              <br>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Contactos</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">


                      <table id="" class="table table-striped table-bordered">
                        <thead>
                          <tr class="table-title-edit">
                            <th class="col-md-4">Nombre</th>
                            <th class="col-md-3">Telefono</th>
                            <th class="col-md-3">Email</th>
                            <th class="col-md-2">Opciones</th>
                          </tr>
                        </thead>
                        <tbody id="contactProviders">
                        </tbody>
                      </table>

                      <div class="box-footer clearfix">
                        <div class="btn-group pull-right">
                          <br>
                          <br>
                          <button type="button" class="btn btn-block btn-default openModalAdd" id="btnAddDetail">
                            <i class="fa fa-plus-circle"></i> Agregar contacto
                          </button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</section>

<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Editar Proveedor</h4>
        </div>
        <div class="modal-body">
          <form action="">
            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input name="_asset" value="{{ url('/') }}" type="hidden">
            <div>
              <div id="fgNombre" class="form-group">
                <label>Nombre:</label>
                  <input type="text" class="form-control" id="inputNombre" placeholder="Nombre del contacto">
                  <span id="spNombre" class="help-block">Please correct the error</span>
              </div>
              <div id="fgTelefono" class="form-group">
                <label>Telefono:</label>
                  <input type="tel" class="form-control" id="inputTelefono" placeholder="Teléfono">
                  <span id="spTelefono" class="help-block">Please correct the error</span>
              </div>
              <div id="fgEmail" class="form-group">
                <label>Email:</label>
                  <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico">
                  <span id="spEmail" class="help-block">No es un correo electrónico valido</span>
              </div>
              <br>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" onclick="agregarContacto()" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>

@push ('scripts')
<script>
  var _token = $('input[name="_token"]').val()
  var urlImport = $('input[name="_asset"]').val()
  var typingTimer
  var doneTypingInterval = 2000
  var counter = 1

  $(".openModalAdd").click(function () {
        var id = $(this).attr('data-id')
        $('#inputEmpresa').val($('#nombreEmpresa'+id).html());
        $('#inputCalle').val($('#calle'+id).html());
        $('#inputIdProveedor').val(id);
        $('#modalContact').modal('show');
      });

  //on keyup, start the countdown
  $('#txtCp').keyup(function(){
      clearTimeout(typingTimer);
      if ($('#txtCp').val()) {
          typingTimer = setTimeout(doneTyping, doneTypingInterval);
      }
  });

  //user is "finished typing," do something
  function doneTyping () {
      //do something
      obtenerDatosDireccion()
  }

  function obtenerDatosDireccion(){
    var txtCp = $('#txtCp').val()
    if(txtCp.length==5){
      $.ajax({
        type: "GET",
        url: `https://api-codigos-postales.herokuapp.com/v2/codigo_postal/${txtCp}`,
        dataType: "json"
      }).done(function(resp){
        $('#txtEstado').val(resp.estado)
        $('#txtMunicipio').val(resp.municipio)
        $("#txtColonia option").remove();
        resp.colonias.forEach(function(k){
          $("#txtColonia").append(new Option(`${k}`, `${k}`));
        })
      }).fail(function(err) {
        swal('¡Error!','Error al realizar la petición ','error');
      })
    }else{
      $('#txtEstado').val("")
      $('#txtMunicipio').val("")
      $("#txtColonia option").remove();
      swal('Error','El código postal debe ser de 5 caracteres','warning');
    }
  }

  function agregarContacto(){
    var nombre = $('#inputNombre').val()
    var telefono = $('#inputTelefono').val()
    var email = $('#inputEmail').val()
    var fila = `<tr id="fila${counter}"><td>${nombre}</td><td>${telefono}</td><td>${email}</td><td class="table-button-center"> <a class="btn boton-eliminar" onclick="eliminarFila(${counter})"><i class="fa fa-trash fa-lg"></i></a> </td></tr>`
  
    if(!nombre){
      $( "#fgNombre" ).addClass( "has-error" );
    }else{
      $( "#fgNombre" ).removeClass( "has-error" );
    }
    
    if(!telefono){
      $( "#fgTelefono" ).addClass( "has-error" );
    }else{
      $( "#fgTelefono" ).removeClass( "has-error" );
    }

    if(!email){
      $( "#fgEmail" ).addClass( "has-error" );
    }else{
      $( "#fgEmail" ).removeClass( "has-error" );
    }

    if(!nombre || !telefono || !email){
      swal('Error','Debe llenar todos los campos','warning');
    }else{
      document.querySelector('#contactProviders').insertAdjacentHTML('afterend', fila)
      $('#inputNombre').val("")
      $('#inputTelefono').val("")
      $('#inputEmail').val("")    
    }
  }

  function eliminarFila(idFila){
    $("#fila"+idFila).remove()
    $('#r2').remove(); 
  }

</script>
@endpush
@stop
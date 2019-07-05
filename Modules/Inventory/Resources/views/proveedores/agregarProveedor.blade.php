@extends('inventory::layouts.master')

@section('main_container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Agregar proveedor
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
        <form class="form-horizontal" method="POST" action="{{ route('temperatures.store') }}">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-8 col-md-offset-2">
              <div class="form-group">
                <label class="control-label col-xs-4">Nombre de la empresa:</label>
                <div class="col-xs-8">
                  <input type="text" required class="form-control" name="txtNombre" placeholder="Nombre de la empresa">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4">Calle:</label>
                <div class="col-xs-8">
                  <input type="text" required class="form-control" name="txtCalle" placeholder="Calle">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4">Número exterior:</label>
                <div class="col-xs-8">
                  <input type="text" required class="form-control" name="txtNumeroExterior" placeholder="Número exterior">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-4">Número interior:</label>
                <div class="col-xs-8">
                  <input type="text" required class="form-control" name="txtNumeroInterior" placeholder="Número interior">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4">Código postal:</label>
                <div class="col-xs-8">
                  <input type="text" maxlength="5" required class="form-control" id="txtCp" name="txtCp" placeholder="Código postal">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4">Colonia:</label>
                <div class="col-xs-8">
                  <select class="form-control" id="txtColonia" name="txtColonia">
                    <option disabled select value="0">Seleccionar</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4">Municipio:</label>
                <div class="col-xs-8">
                  <input type="text" required class="form-control" id="txtMunicipio" name="txtMunicipio" disabled placeholder="Municipio">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-xs-4">Estado:</label>
                <div class="col-xs-8">
                  <input type="text" required class="form-control" id="txtEstado" name="txtEstado" disabled placeholder="Estado">
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
@push ('scripts')
<script>
  var _token = $('input[name="_token"]').val()
  var urlImport = $('input[name="_asset"]').val()
  
  var typingTimer;                //timer identifier
  var doneTypingInterval = 2000;  //time in ms (5 seconds)

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
    if(txtCp.length>5){
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
      swal('Error','El Cp debe ser de 5 caracteres ','warning');
    }
  }


</script>
@endpush
@stop
 @extends('documents::layout_documents')
  @section ('Contenido')
 <!--content-wrapper-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar usuario
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Nivel</a></li>
        <li>Administrar</li>
        <li class="active">Editar Usuario</li>
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
            <form method="POST" Action="{{ route('usuarios.update', $usuario->idUsuario) }}" role="form" enctype="multipart/form-data">
              <input name="_method" type="hidden" value="PUT">
              <input name="_token" value="{{ csrf_token() }}" type="hidden">
              <div class="box-body">

              <div class="col-md-6">

                <div class="form-group">
                  <label>Tipo de usuario</label>
                  <select class="form-control" disabled id="Tipo_Usuario" required name="Tipo_Usuario">
                  <option value="{{$usuario->Tipo_Usuario}}" selected="true">{{$usuario->Tipo_Usuario}}</option>

                  </select>
                </div>

                <div class="form-group">
                  <label for="txtnombre">Nombre(s)</label>
                  <input class="form-control" type="text" name="Nombre" maxlegth="30" id="Nombre" value="{{$usuario->Nombre}}" required>
                </div>

                <div class="form-group">
                  <label for="txtappat">Apellido paterno</label>
                  <input class="form-control" type="text" id="A_Paterno" maxlegth="20" name="A_Paterno" value="{{$usuario->A_Paterno}}" required>
                </div>

                 <div class="form-group">
                  <label for="txtapmat">Apellido materno</label>
                  <input class="form-control" type="text" id="A_Materno" maxlegth="20" name="A_Materno" value="{{$usuario->A_Materno}}" required>
                </div>

            <!--
                <div class="form-group">
                  <label>Grupo</label>
                  <select class="form-control" id=slgrupo>
                    <option value="Grupo" selected="true">Grupo 1</option>

                  </select>
                </div>
            -->
                 <!--<div class="form-group">
                    <label>Grupo al que está incrito actualmente</label>
                    <select class="form-control" disabled="" id="slgrupo">
                      <option value="g1">Grupo 1</option>
                      <option value="g2">Grupo 2</option>
                    </select>
                </div>-->

              </div>

              <div class="col-md-6">

                 <div class="form-group">
                  <label for="FechaNac">Fecha de nacimiento</label>
                  <input class="form-control" type="text" id="FechaNac" name="FechaNac" required readonly style="background:white;" value="{{$usuario->FechaNac}}">
                </div>

                <div class="form-group">
                  <label>Sexo</label>
                  <select class="form-control" required id="Sexo" name="Sexo">
                    @if($usuario->Sexo==1)
                        <option value="1" selected>Masculino</option>
                        <option value="0" >Femenino</option>
                    @else
                        <option value="1" >Masculino</option>
                        <option value="0" selected>Femenino</option>
                    @endif
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtnumero">Número de teléfono</label>
                <input class="form-control" type="text" pattern="[0-9]{10}" id="Celular" value="{{$usuario->Celular}}" name="Celular" required>

                </div>

                <div class="form-group">
                        <div class="form-group has-feedback">
                          <label for="txtcorreo">Correo electrónico</label>
                        <input type="email" required class="form-control" value="{{$usuario->Correo}}" name="Correo" id="Correo" placeholder="ejemplo@email.com" required>
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                </div>
                <br>
                 <div class="form-group">
                 <img src="{{Storage::url($usuario->Imagen)}}" widht="30px" height="30px"alt="Foto de perfil">
                  <label for="flfoto">Añadir foto de perfil</label>
                  <input type="file" id="Imagen" name="Imagen" >
                  <p class="help-block">Suba una fotografía en formato .jpg o .png</p>
                </div>



                 <!--<div class="form-group">
                    <label>Grupo al que está incrito actualmente</label>
                    <select class="form-control" disabled="" id="slgrupo">
                      <option value="g1">Grupo 1</option>
                      <option value="g2">Grupo 2</option>
                    </select>
                </div>-->

              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Grados de estudio registrados</h3>
                      </div>
                      <div class="box-body table-responsive no-padding">
                        <table id="detalles" class="table table-hover">
                          <thead>
                            <tr>
                              <th>Grado</th>
                              <th>Escuela</th>
                              <th>Carrera o estudios</th>
                              <th>Año inicio</th>
                              <th>Año término</th>
                              <th>Estatus</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                            @foreach($detailLevels as $detail)
                              <tr>
                                <td>{{($detail->level())[0]->Grado}}</td>
                                <td>{{$detail->Escuela}}</td>
                                <td>{{$detail->Carrera}}</td>
                                <td>{{$detail->Ingreso}}</td>
                                <td>{{$detail->Egreso}}</td>
                                <td>{{$detail->Estatus}}</td>
                                <td>
                                  <div class="btn-group form-inline">
                                    <a class="btn btn-danger" onclick="eliminar({{$detail->id}});">Eliminar</a>
                                  </div>
                                </td>
                              </tr>
                            @endforeach                     
                          </tbody>
                      </table>
                      </div>




                      <hr/>
                      <div class="box-header">
                          <h3 class="box-title">Agregar grado de estudios</h3>
                        </div>
                      <div class="box-body table-responsive no-padding">
                          <table  class="table table-hover">
                            <thead>
                              <tr>
                                <th>Grado</th>
                                <th>Escuela</th>
                                <th>Carrera o estudios</th>
                                <th>Año inicio</th>
                                <th>Año término</th>
                                <th>Estatus</th>
                                <th>Opciones</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                                                            
                              <tr>
                                <td>
                                  <select class="form-control" id=slgrado>
                                    @foreach($levels as $level)
                                      <option value="{{$level->idNivel}}">{{$level->Grado}}</option>
                                    @endforeach
                                  </select>
                                </td>
                                <td><input class="form-control" type="text" id="txtescuela"></td>
                                <td><input class="form-control" type="text" id="txtcarrera"></td>
                                <td><input class="form-control ano" type="text" id="txtfechaini" readonly style="background:white;"></td>
                                <td><input class="form-control ano" type="text" id="txtfechafin" readonly style="background:white;"></td>
                                <td>
                                  <select class="form-control" id=slestatus>
                                      <option value="Enprogreso">En progreso</option>
                                      <option value="Egresado">Egresado</option>
                                      <option value="Pasante">Pasante</option>
                                      <option value="Titulado">Titulado</option>
                                  </select>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                        </div>
                      <div class="box-footer clearfix">
                        <div class="btn-group pull-right">
                         <button type="button" class="btn btn-block btn-default" id="btnagregar"><i class="fa fa-plus-circle"></i> Agregar</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">

                <button type="submit" class="btn btn-primary pull-right" id="btnaceptar" name="btnaceptar"><i class="glyphicon glyphicon-ok"></i> Aceptar</button>
              </div>
              <!-- /.box-footer -->

               </form>
              </div>
            </div>
          </div>
    </section>
  </div>
  @push ('scripts')
  <script>
    var detailLevels = {!! json_encode($detailLevels->toArray()) !!};
    $(document).ready(function(){
      var _token = $('input[name="_token"]').val();

      $('#btnagregar').click(function(){
        agregar()
      });

      function agregar(){
        var gradoLabel= $('#slgrado option:selected').text()
        var grado= $('#slgrado').val()
        var escuela= $('#txtescuela').val()
        var carrera= $('#txtcarrera').val()
        var fechaInicio= $('#txtfechaini').val()
        var fechaFin= $('#txtfechafin').val()
        var estatus= $('#slestatus').val()
        var cont =0;
        var fila='+<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="elemento[]" value="'+grado+'">'+gradoLabel+'</td> <td><input type="hidden" name="nombreElemento[]" value="'+escuela+'">'+escuela+'</td> <td><input type="hidden" name="ancho[]" value="'+carrera+'">'+carrera+'</td><td><input type="hidden" name="etiqueta[]" value="'+fechaInicio+'">'+fechaInicio+'</td><td><input type="hidden" name="globo[]" value="'+fechaFin+'">'+fechaFin+'</td><td><input type="hidden" name="observaciones[]" value="'+estatus+'">'+estatus+'</td> <td><a class="btn btn-danger" onclick="eliminar({{$detail->id}});">Eliminar</a></td></tr>';

        $('#detalles').append(fila);
        /*
        idUsuario 
        idNivel
        Carrera
        Escuela
        Ingreso
        Egreso
        Estatus
        */
      }
    })
  </script>
@endpush
@stop

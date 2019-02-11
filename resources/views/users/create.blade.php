 @extends('layout')
    @section ('contenido')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registro de usuarios
        <small>Aquí se registran tanto profesores como alumnos por el administrador</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Nivel</a></li>
        <li>Administrar</li>
        <li class="active">Nuevo Usuario</li>
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
              
              <form role="form">

              <div class="box-body">

              <div class="col-md-6">

                <div class="form-group">
                  <label>Tipo de usuario</label>
                  <select class="form-control" id=slTipoUsuario>
                    <option value="Alumno" selected="true">Alumno</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Tecnico">Técnico</option>
                    <option value="Auxiliar">Auxiliar de laboratorio</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtnombre">Nombre(s)</label>
                  <input class="form-control" type="text" id="txtNombre" placeholder="Escribe tu nombre(s)" required>
                </div>

                <div class="form-group">
                  <label for="txtappat">Apellido paterno</label>
                  <input class="form-control" type="text" id="txtappat" placeholder="Escribe tu apellido paterno" required>
                </div>

                 <div class="form-group">
                  <label for="txtapmat">Apellido materno</label>
                  <input class="form-control" type="text" id="txtapmat" placeholder="Escribe tu apellido materno" required>
                </div>

               
                <div class="form-group">
                  <label>Grupo</label>
                  <select class="form-control" id=slgrupo>
                    <option value="Grupo" selected="true">Grupo 1</option>
                    
                  </select>
                </div>

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
                  <label for="txtfecha">Fecha de nacimiento</label>
                  <input class="form-control" type="date" id="txtfecha" required>
                </div>        

                <div class="form-group">
                  <label>Sexo</label>
                  <select class="form-control" id=slsexo>
                    <option value="0" selected="true">Femenino</option>
                    <option value="1">Masculino</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="txtnumero">Número de teléfono</label>
                  <input class="form-control" type="text" id="txtnumero" placeholder="ejemplo 5545566789" required>
                </div>

                 <div class="form-group">
                  <label for="flfoto">Añadir foto</label>
                  <input type="file" id="flfoto">
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
                        <h3 class="box-title">Agregar grado de estudios</h3>                
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                          <tbody><tr>
                            <th>Grado</th>
                            <th>Escuela</th>
                            <th>Carrera o estudios</th>
                            <th>Año inicio</th>
                            <th>Año término</th>
                            <th>Estatus</th>
                          </tr>
                          <tr>
                            <td>Diplomado</td>
                            <td>UPIICSA - IPN</td>
                            <td>Diplomado en seguridad </td>
                            <td>2015</td>
                            <td>2016</td>
                            <td>Egresado</td>
                          </tr>              
                          
                          <tr>
                              <td><select class="form-control" id=slgrado>
                                  <option value="Tecnico">Técnico</option>
                                  <option value="Licenciatura">Licenciatura</option>
                                  <option value="Diplomado">Diplomado</option>
                                  <option value="Maestria">Maestría</option>
                                  <option value="Doctorado">Doctorado</option>
                              </select></td>
                            <td><input class="form-control" type="text" id="txtescuela"></td>
                            <td><input class="form-control" type="text" id="txtcarrera"></td>                            
                            <td><input class="form-control" type="date" id="txtfechaini"></td>
                            <td><input class="form-control" type="date" id="txtfechafin"></td>
                            <td><select class="form-control" id=slestatus>
                                  <option value="Enprogreso">En progreso</option>
                                  <option value="Egresado">Egresado</option>
                                  <option value="Pasante">Pasante</option>
                                  <option value="Titulado">Titulado</option>
                              </select></td>
                          </tr>


                        </tbody></table>

                      </div>

                      <div class="box-footer clearfix">
                        <div class="btn-group">
                         <button type="submit" class="btn btn-primary pull-right" id="btnagregar">Agregar nuevo</button>
                        </div>
                      </div>



                    </div>
                    <!-- /.box -->
                  </div>
                </div>
                <!--/.row.-->
                </div>

                

                <div class="col-md-6">
               
                  <div class="form-group">
                    <label for="txtcorreo">Correo electrónico</label>
                    <input type="email" class="form-control" id="txtcorreo" placeholder="ejemplo@email.com" required>
                  </div>

                  <div class="form-group">
                    <label for="txtpassword1">Contraseña</label>
                    <input type="password" class="form-control" id="txtpassword1" placeholder="********" required>
                  </div>  

                  <div class="form-group">
                    <label for="txtpassword2">Repetir ontraseña</label>
                    <input type="password" class="form-control" id="txtpassword2" placeholder="********" required>
                  </div>  

                </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                
                <button type="submit" class="btn btn-primary pull-right" id="btnaceptar">Aceptar</button>
              </div>
              <!-- /.box-footer -->

               </form>

              </div>

            </div>
          </div>
        

    
   <!--------------------------
        | Your Page Content Here |
        -------------------------->
      


     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop
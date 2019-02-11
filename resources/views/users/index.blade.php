 
    @extends('layout')
    @section ('contenido')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Usuarios
        <small>Aquí se muestran todos los usuarios del sistema</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Nivel</a></li>
        <li>Administrar</li>
        <li class="active">Usuarios</li>
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

              <div class="col-md-12">

                 <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">

                  <div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Buscar: <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div>
                </div>

                <div class="row">
                  <div class="col-sm-12">

                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

                      <thead>
                        <tr role="row">

                           <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 164px;">Tipo de usuario</th>

                          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 164px;">Nombre(s)</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 225px;">Apellido paterno</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Apellido materno</th>


                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Grupo</th>


                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Fecha de nacimiento</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Sexo</th>


                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Teléfono</th>


                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Correo electrónico</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Grado</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Estatus</th>

                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Acciones</th>

                        </tr>
                      </thead>

                      <tbody>
             
                        <tr role="row" class="odd">
                          <td class="sorting_1">Alumno</td>
                          <!--luego lo agrego, XD-->
                          <td>Nombre</td>
                          <td>Apellido paterno</td>
                          <td>Apellido materno</td>
                          <td>Grupo</td>
                          <td>Fecha</td>
                          <td>Femenino</td>
                          <td>5544332211</td>
                          <td>ejemplo@gmail.com</td>
                          <td>Diplomado</td>
                          <td>Egresado</td>
                          <td>
                              
                            <div class="btn-group">
                             <button type="button" class="btn btn-primary pull-right" id="btnEditar">Editar</button>
                            
                            
                             <button type="button" class="btn btn-primary pull-right" id="btnEliminar">Eliminar</button>
                            </div>
                          
                          </td>
                        </tr>

                        

                        

                      </tbody>

                      <tfoot>
                      </tfoot>

                    </table>

                </div>
              </div>

                
               

              </div>

            
              

                

                

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                
                
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
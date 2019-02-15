 
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
               <h3 class="box-title">Usuarios</h3>
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
                    <div class="box-body table-responsive no-padding">
                     <table id="tblUsuarios" class="table table-hover">

                      <thead>
                        <tr role="row">

                          <th>Tipo de usuario</th>
                          <th >Nombre(s)</th>
                          <th>Apellido paterno</th>
                          <th>Apellido materno</th>
                          <th>Grupo</th>
                          <th >Fecha de nacimiento</th>
                          <th>Sexo</th>
                          <th>Teléfono</th>
                          <th>Correo electrónico</th>
                          <th>Grado</th>
                          <th>Estatus</th>
                          <th>Acciones</th>

                        </tr>
                      </thead>

                      <tbody>
                        @foreach($users as $user)
                        <tr role="row" class="odd">
                          <td class="sorting_1">{{$user->Tipo_Usuario}}</td>
                          <!--luego lo agrego, XD-->
                          <td>{{$user->Nombre}}</td>
                          <td>{{$user->A_Paterno}}</td>
                          <td>{{$user->A_Materno}}</td>
                          <td>Grupo</td>
                          <td>{{$user->FechaNac}}</td>
                          <td>{{$user->Sexo}}</td>
                          <td>{{$user->Celular}}</td>
                          <td>{{$user->Correo}}</td>
                          <td>Diplomado</td>
                          <td>Egresado</td>
                          <td>
                              
                            <div class="btn-group form-inline">
                             <button type="button" class="btn btn-primary " id="btnEditar">Editar</button>
                             </div>
                             <div class="btn-group form-inline">
                             <button type="button" class="btn btn-primary " id="btnEliminar">Eliminar</button>
                             </div>
                            
                          
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
                <!-- /.box-body -->

               

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
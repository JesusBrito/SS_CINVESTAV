  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{Storage::url(auth()->user()->Imagen)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{auth()->user()->Nombre}} {{auth()->user()->A_Paterno}}</p>

            </div>
          </div>



          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menú</li>
            <!-- Optionally, you can add icons to the links -->

            <li><a href="#"><i class="fa fa-pencil-square-o"></i> <span>Alertas</span></a></li>
            <li><a href="#"><i class="fa fa-file-text"></i> <span>Bitácora de desechos</span></a></li>
            <li><span>Insumos</span></li>

            <li class="treeview">
              <a href="#">
                <span>Reactivos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: all;">
                <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar reactivo</a></li>
                <li><a href="#"><i class="fa fa-list-ul"></i>Listar reactivos</a></li>
              </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Consumibles</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar consumible</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar consumibles</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Equipos</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar equipo</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar equipos</a></li>
                    </ul>
            </li>

            <li><span>Gestión de usuarios</span></li>

            <li class="treeview">
                    <a href="#">
                      <span>Usuarios</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar usuario</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar usuarios</a></li>
                    </ul>
            </li>

            <li><span>Gestión de proveedores</span></li>

            <li class="treeview">
                    <a href="#">
                      <span>Proveedores</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar proveedor</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar proveedores</a></li>
                    </ul>
            </li>

            <li><span>Catalógos</span></li>

            <li class="treeview">
                    <a href="#">
                      <span>Toxicidades</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar toxicidad</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar toxicidades</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Tipos de reactivos</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar tipo</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar tipos</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Temperaturas</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar temperatura</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar temperaturas</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Ubicaciones</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar ubicación</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar ubicaciones</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Marcas</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar marca</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar marcas</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Categorías de consumibles</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar categoría</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar categorías</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Categorías de desechos</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar categoría</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar categorías</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <span>Unidades de volumen</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-user-plus"></i>Agregar unidad</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar unidades</a></li>
                    </ul>
            </li>

          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

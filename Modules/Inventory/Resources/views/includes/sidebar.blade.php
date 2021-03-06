  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ auth()->user()->imagen }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{auth()->user()->Nombre}} {{auth()->user()->A_Paterno}}</p>

            </div>
          </div>



          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menú</li>
            <!-- Optionally, you can add icons to the links -->

            <li><a href="#"><i class="fa fa-warning"></i> <span>Alertas</span></a></li>
            <li><a href="{{url('inventory/wasteslog')}}"><i class="fa fa-book"></i> <span>Bitácora de desechos</span></a></li>

            <li class="header"><i class="fa fa-cubes"></i><span>Insumos</span></li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-flask"></i>
                <span>Reactivos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: all;">
                <li class="active"><a href="#"><i class="fa fa-plus-square"></i>Agregar reactivo</a></li>
                <li><a href="#"><i class="fa fa-list-ul"></i>Listar reactivos</a></li>
              </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-briefcase"></i>
                      <span>Consumibles</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{url('inventory/consumables/create')}}"><i class="fa fa-plus-square"></i>Agregar consumible</a></li>
                      <li><a href="{{url('inventory/consumables')}}"><i class="fa fa-list-ul"></i>Listar consumibles</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                       <i class="fa fa-desktop"></i>
                      <span>Equipos</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-plus-square"></i>Agregar equipo</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Listar equipos</a></li>
                    </ul>
            </li>

            <li class="header"><i class="fa fa-users"></i><span>Gestión de usuarios</span></li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-user"></i>
                      <span>Usuarios</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{route('usersInventory.create')}}"><i class="fa fa-user-plus"></i>Agregar usuario</a></li>
                      <li><a href="{{route('usersInventory.index')}}"><i class="fa fa-list-ul"></i>Listar usuarios</a></li>
                    </ul>
            </li>

            <li class="header"><i class="fa fa-industry"></i><span>Gestión de proveedores</span></li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-suitcase"></i>
                      <span>Proveedores</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="#"><i class="fa fa-plus-square"></i>Agregar proveedor</a></li>
                      <li><a href="{{url('inventory/providers')}}"><i class="fa fa-list-ul"></i>Listar proveedores</a></li>
                      <li><a href="#"><i class="fa fa-list-ul"></i>Detalle proveedores</a></li>
                    </ul>
            </li>

            <li class="header"><i class="fa fa-archive"></i><span>Catalógos</span></li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-asterisk"></i>
                      <span>Toxicidades</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                    <li class="active"><a href="{{url('inventory/toxicities/create')}}"><i class="fa fa-plus-square"></i>Agregar toxicidad</a></li>
                    <li><a href="{{url('inventory/toxicities')}}"><i class="fa fa-list-ul"></i>Listar toxicidades</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-flask"></i>
                      <span>Tipos de reactivos</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{url('inventory/typeReactives/create')}}"><i class="fa fa-plus-square"></i>Agregar tipo</a></li>
                      <li><a href="{{url('inventory/typeReactives')}}"><i class="fa fa-list-ul"></i>Listar tipos</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-sun-o"></i>
                      <span>Temperaturas</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{url('inventory/temperatures/create')}}"><i class="fa fa-plus-square"></i>Agregar temperatura</a></li>
                      <li><a href="{{url('inventory/temperatures')}}"><i class="fa fa-list-ul"></i>Listar temperaturas</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-location-arrow"></i>
                      <span>Ubicaciones</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{url('inventory/locations/create')}}"><i class="fa fa-plus-square"></i>Agregar ubicación</a></li>
                      <li><a href="{{url('inventory/locations')}}"><i class="fa fa-list-ul"></i>Listar ubicaciones</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-registered"></i>
                      <span>Marcas</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{url('inventory/brands/create')}}"><i class="fa fa-plus-square"></i>Agregar marca</a></li>
                      <li><a href="{{url('inventory/brands')}}"><i class="fa fa-list-ul"></i>Listar marcas</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-briefcase"></i>
                      <span>Categorías de consumibles</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{url('inventory/categoryConsumables/create')}}"><i class="fa fa-plus-square"></i>Agregar categoría</a></li>
                      <li><a href="{{url('inventory/categoryConsumables')}}"><i class="fa fa-list-ul"></i>Listar categorías</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-trash-o"></i>
                      <span>Tipos de desecho</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{url('inventory/wastes/create')}}"><i class="fa fa-plus-square"></i>Agregar tipo</a></li>
                      <li><a href="{{url('inventory/wastes')}}"><i class="fa fa-list-ul"></i>Listar categorías</a></li>
                    </ul>
            </li>

            <li class="treeview">
                    <a href="#">
                      <i class="fa fa-sort-numeric-asc"></i>
                      <span>Unidades de medida</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" style="display: all;">
                      <li class="active"><a href="{{url('inventory/unities/create')}}"><i class="fa fa-plus-square"></i>Agregar unidad</a></li>
                      <li><a href="{{url('inventory/unities')}}"><i class="fa fa-list-ul"></i>Listar unidades</a></li>
                    </ul>
            </li>

          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

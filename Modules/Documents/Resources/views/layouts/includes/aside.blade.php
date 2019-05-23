<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->imagen }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->nombre_completo }}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menú</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Administrar</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: all;">
                    <li @linkactive('users.create')><a href="{{ route('users.create') }}"><i class="fa fa-user-plus"></i> Registrar Nuevo Usuario</a></li>
                    <li @linkactive('groups.create')><a href="{{ route('groups.create') }}"><i class="fa fa-user-plus"></i> Registrar Nuevo Grupo</a></li>
                    <li @linkactive('users.index')><a href="{{ route('users.index') }}"><i class="fa fa-list-ul"></i> Listado de Alumnos</a></li>
                    <li @linkactive('groups.create')><a href="{{ route('groups.index') }}"><i class="fa fa-list-ul"></i> Listado de Grupos</a></li>
                    <li><a href="#"><i class="fa fa-list-ul"></i>Listado de Profesores</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-group"></i> <span>Listado de Alumnos</span></a></li>
            <li><a href="#"><i class="fa fa-globe"></i> <span>Estancias</span></a></li>
            <li><a href="#"><i class="fa fa-users"></i> <span>Colaboraciones</span></a></li>
            <li><a href="#"><i class="fa fa-pencil-square-o"></i> <span>Cursos</span></a></li>
            <li><a href="#"><i class="fa fa-puzzle-piece"></i> <span>Convenios</span></a></li>
            <li><a href="#"><i class="fa fa-calendar"></i> <span>Conferencias</span></a></li>
            <li><a href="#"><i class="fa fa-certificate"></i> <span>Patentes</span></a></li>
            <li><a href="#"><i class="fa fa-graduation-cap"></i> <span>Tesis</span></a></li>
            <li><a href="#"><i class="fa fa-file-text"></i> <span>Publicaciones</span></a></li>
            <li><a href="#"><i class="fa fa-institution"></i> <span>Congresos</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

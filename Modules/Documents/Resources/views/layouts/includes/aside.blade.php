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
                <li class="active"><a href="registrousers.html"><i class="fa fa-user-plus"></i>Registrar Nuevo Usuario</a></li>
                <li><a href="{{ route('groups.create') }}"><i class="fa fa-user-plus"></i>Registrar Nuevo Grupo</a></li>
                <li><a href="todosalumnos.html"><i class="fa fa-list-ul"></i>Listado de Alumnos</a></li>
                <li><a href="todosgroups.html"><i class="fa fa-list-ul"></i>Listado de Grupos</a></li>
                <li><a href="todosprofesores.html"><i class="fa fa-list-ul"></i>Listado de Profesores</a></li>
                </ul>
            </li>

                <li><a href="alumnosprofesores.html"><i class="fa fa-group"></i> <span>Listado de Alumnos</span></a></li>

            <li><a href="registrarestancia.html"><i class="fa fa-globe"></i> <span>Estancias</span></a></li>
            <li><a href="registrarcolaboracion.html"><i class="fa fa-users"></i> <span>Colaboraciones</span></a></li>
            <li><a href="registrarcurso.html"><i class="fa fa-pencil-square-o"></i> <span>Cursos</span></a></li>
            <li><a href="crearconvenio.html"><i class="fa fa-puzzle-piece"></i> <span>Convenios</span></a></li>
            <li><a href="registrarconferencia.html"><i class="fa fa-calendar"></i> <span>Conferencias</span></a></li>
            <li><a href="registrarpatente.html"><i class="fa fa-certificate"></i> <span>Patentes</span></a></li>
            <li><a href="registrartesis.html"><i class="fa fa-graduation-cap"></i> <span>Tesis</span></a></li>
            <li><a href="registrarpublicaciones.html"><i class="fa fa-file-text"></i> <span>Publicaciones</span></a></li>
            <li><a href="registrarcongreso.html"><i class="fa fa-institution"></i> <span>Congresos</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Main Header -->
<header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <span class="logo-mini"><b>G</b>PI</span>
          <span class="logo-lg">CINVESTAV</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

           <a href="#" class="navbar-brand">
          <!-- logo for regular state and mobile devices -->
          <span id=><b id="texto"></b></span>
          </a>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">1</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Notificacion de mensajes nuevos</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="{{Storage::url(auth()->user()->Imagen)}}" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Nuevo comentario
                            <small><i class="fa fa-clock-o"></i> 10 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Se ha comentado en la actividad X</p>
                        </a>
                      </li>
                      <!-- end message -->
                    </ul>
                    <!-- /.menu -->
                  </li>
                  <li class="footer"><a href="vernotificaciones.html">Ver todos los mensajes</a></li>
                </ul>
              </li>
              <!-- /.messages-menu -->





              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{Storage::url(auth()->user()->Imagen)}}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{auth()->user()->Nombre}} {{auth()->user()->A_Paterno}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{Storage::url(auth()->user()->Imagen)}}" class="img-circle" alt="User Image">

                    <p>
                        {{auth()->user()->Nombre}} {{auth()->user()->A_Paterno}} - {{auth()->user()->Tipo_Usuario}}

                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-body">


                     <div class="col-xs-4 text-center">
                     <a href="#" class="btn btn-default btn-flat">Sistema <br> documentos</a>
                    </div>
                    <div class="pull-right text-center">
                      <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Cerrar <br> sesión</a>

                  </div>

                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>

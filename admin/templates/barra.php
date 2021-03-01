<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed principal">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light navegacion clearfix">
            
            <!-- Left navbar links -->
            <ul class="navbar-nav col-md-4">
                <li class="nav-item menu_barra">
                    <a class="nav-link" id="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a href="../index.php" class="brand-link">
                        <img src="../favicon.png" alt="Unidos en Fe" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="d-none d-sm-inline-block brand-text font-weight-light texto_logo">Fe y Esperanza</span>
                    </a>
                </li>
            </ul>

            <!-- Center navbar links -->
            <ul class="navbar-nav col-md-4 navegacion_center">
                <li class="nav-item d-sm-inline-block">
                    <a href="admin_area.php" class="nav-link icono" title="Inicio"><i class="fas fa-home"></i></a>
                </li>

                <!-- Contactos -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="lista_miembros.php" class="nav-link icono" title="Amigos"><i class="fas fa-user-circle"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="col-md-4 mb-0">
                <div class="navbar-nav navegacion_right">
                    <!-- User Information -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle perfil_nav" data-toggle="dropdown">
                            <img src="../favicon.png" class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="../favicon.png" class="img-circle elevation-2" alt="User Image">
                                <p><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="login.php?cerrar_sesion=true" class="btn btn-default btn-flat float-right">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                </div>
            </ul>
        </nav>
        <!-- /.navbar -->
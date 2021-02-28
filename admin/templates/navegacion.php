<!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-warning elevation-4 main_sidebar_left">
           
            <!-- Sidebar -->
            <div class="sidebar sidebar_left">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="perfil.php" class="d-block">Benjamín Quintana</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="admin_area.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- Páginas -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-flag"></i>
                                <p>
                                    Páginas 
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lista_eventos.php" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Ver Todos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="crear_eventos.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Radio en Vivo -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-broadcast-tower"></i>
                                <p>
                                    Radios en Vivo
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lista_radios.php" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Ver Todos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="crear_radio.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Canales -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tv"></i>
                                <p>
                                    Canales
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lista_eventos.php" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Ver Todos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="crear_eventos.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Amigos -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Amigos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lista_eventos.php" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Ver Todos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="crear_eventos.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Administradores -->
                        <?php if($_SESSION['nivel'] == 1): ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Administradores
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lista_admin.php" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Ver Todos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="crear_admin.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
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
                        <p class="d-block"><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></p>
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
                                    <a href="lista_paginas.php" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Ver Todos</p>
                                    </a>
                                </li>
                                <?php if($_SESSION['nivel'] <= 2): ?>
                                <li class="nav-item">
                                    <a href="crear_pagina.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                                <?php endif; ?>
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
                                <?php if($_SESSION['nivel'] <= 2): ?>
                                <li class="nav-item">
                                    <a href="crear_radio.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                                <?php endif; ?>
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
                                    <a href="lista_canales.php" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Ver Todos</p>
                                    </a>
                                </li>
                                <?php if($_SESSION['nivel'] <= 2): ?>
                                <li class="nav-item">
                                    <a href="crear_canal.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <!-- Miembros -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Miembros
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="lista_miembros.php" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Ver Todos</p>
                                    </a>
                                </li>
                                <?php if($_SESSION['nivel'] <= 2): ?>
                                <li class="nav-item">
                                    <a href="crear_miembro.php" class="nav-link">
                                        <i class="nav-icon fas fa-plus-circle"></i>
                                        <p>Agregar</p>
                                    </a>
                                </li>
                                <?php endif; ?>
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
<?php
    $id_session = $_SESSION['id'];
    $sql = "SELECT * FROM miembros WHERE id_miembro = $id_session ";
    $resultado = $conn->query($sql);
    $info_miembro = $resultado->fetch_assoc();
?>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-warning elevation-4 main_sidebar_left">
           
            <!-- Sidebar -->
            <div class="sidebar sidebar_left">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/miembros/<?php echo $info_miembro['url_img_miembro'] ?>" class="img-circle elevation-2 uploaded_image" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="mi_perfil.php" class="d-block"><?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-flag"></i>
                                <p>Páginas <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php 
                                    try {
                                        $sql = "SELECT * FROM paginas";
                                        $resultado = $conn->query($sql);
                                    } catch (\Exception $e) {
                                        $error = $e->getMessage();
                                        echo "$error";
                                    }
                                    while($paginas = $resultado->fetch_assoc() ) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo $paginas['link'] ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo $paginas['nombre_pagina'] ?></p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-broadcast-tower"></i>
                                <p>
                                    Radio en Vivo
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php 
                                    try {
                                        $sql = "SELECT * FROM radios";
                                        $resultado = $conn->query($sql);
                                    } catch (\Exception $e) {
                                        $error = $e->getMessage();
                                        echo "$error";
                                    }
                                    while($radios = $resultado->fetch_assoc() ) { ?>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo $radios['nombre_radio'] ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <audio controls src="<?php echo $radios['link'] ?>" controlslist="nodownload" class="controls"></audio>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tv"></i>
                                <p>
                                    Canales
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php 
                                    try {
                                        $sql = "SELECT * FROM canales";
                                        $resultado = $conn->query($sql);
                                    } catch (\Exception $e) {
                                        $error = $e->getMessage();
                                        echo "$error";
                                    }
                                    while($canales = $resultado->fetch_assoc() ) { ?>
                                    <li class="nav-item">
                                        <a href="<?php echo $canales['link'] ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo $canales['nombre_canal'] ?></p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="https://checkout.square.site/buy/57VWMWQWCKW4XFET6SDFSTRM" class="nav-link">
                                <i class="nav-icon fas fa-heart"></i>
                                <p>Donaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            
                            <a target="_blank" href="https://5500-copper-bobolink-z74mqd9z.ws-us03.gitpod.io/social/chat" class="nav-link">
                            <i class="nav-icon fas fa-mail-bulk"></i>
                                <p>
                                    Chat
                                    <!--<span class="badge badge-danger right">3</span>-->
                                </p>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a href="contactos.php" class="nav-link">
                                <i class="fas fa-user-circle nav-icon"></i>
                                <p>Amigos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>Fotos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-video"></i>
                                <p>Videos</p>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
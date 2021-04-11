<?php 
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    //Header
    include_once 'templates/header.php';
    //Barra
    include_once 'templates/barra.php';
    //Navegacion
    include_once 'templates/navegacion.php';
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper clearfix">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row social">
                        <!-- Muro Principal -->
                        <?php
                            $id_session = $_SESSION['id'];
                            $sql = "SELECT * FROM miembros WHERE id_miembro = $id_session ";
                            $resultado = $conn->query($sql);
                            $info_miembro = $resultado->fetch_assoc();
                        ?>
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="../img/miembros/<?php echo $info_miembro['url_img_miembro'] ?>" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center"><?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?></h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- Lista de Amigos -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Amigos en Fe</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- Contacts are loaded here -->
                                    <ul class="contacts-list">
                                    <?php
                                        try {
                                            $sql = "SELECT * FROM miembros WHERE id_miembro != $id_session ";
                                            $resultado = $conn->query($sql);
                                        } catch (\Exception $e) {
                                            $error = $e->getMessage();
                                            echo "$error";
                                        }
                                        while($miembro = $resultado->fetch_assoc() ) { ?>
                                        <li id="<?php echo $miembro['id_miembro'] ?>" class="contacto" data-touserid="<?php echo $miembro['id_miembro'] ?>" >
                                            <a href="#">
                                                <img class="contacts-list-img" src="../img/miembros/<?php echo $miembro['url_img_miembro'] ?>" alt="img_<?php echo $miembro['nombre_miembro'] . " " . $miembro['apellido_miembro'] ?>">
                                                <div class="lista_contactos">
                                                    <span class="contacts-list-name">
                                                        <?php echo $miembro['nombre_miembro'] . " " . $miembro['apellido_miembro'] ?>
                                                        <small class="contacts-list-date float-right">2/28/2015</small>
                                                    </span>
                                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                                    
                                                    <span title="<?php echo $no_leidos['no_leidos'] ?> Nuevos Mensajes" class="badge bg-danger float-right"><?php echo $no_leidos['no_leidos'] ?></span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <?php } ?>
                                    </ul>
                                    <!-- /.contatcts-list -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <!-- Chat -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Chat</a></li>
                                    </ul>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <!-- Conversations are loaded here -->
                                    <div class="direct-chat-messages">
                                        
                                        <!-- Message. Default to the left -->
                                        <div class="direct-chat-msg">
                                            <?php
                                                $id_session = $_SESSION['id'];
                                                $sql = "SELECT * FROM miembros WHERE id_miembro = $id_session ";
                                                $resultado = $conn->query($sql);
                                                $info_miembro = $resultado->fetch_assoc();
                                            ?>
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left"><?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?></span>
                                                <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img uploaded_image" src="../img/miembros/<?php echo $info_miembro['url_img_miembro'] ?>" alt="Message User Image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                Is this template really for free? That's unbelievable!
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->
                                    
                                        <!-- Message to the right -->
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                            </div>
                                            <!-- /.direct-chat-infos -->
                                            <img class="direct-chat-img" src="../img/miembros/<?php echo $info_miembro['url_img_miembro'] ?>" alt="Message User Image">
                                            <!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                You better believe it!
                                            </div>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->
                                    </div>
                                    <!--/.direct-chat-messages-->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <textarea type="text" name="message" rows="1" placeholder="Escribe el Mensaje..." class="form-control"></textarea>
                                            <span class="input-group-append">
                                                <input type="hidden" name="chat" value="nuevo">
                                                <button type="submit" class="btn btn-success">Enviar</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-footer-->
                                
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <!-- Chat -->
                        <?php //include_once 'templates/chat.php'?>
                        <!-- Fin Chat -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        

<!-- Footer -->
<?php include_once 'templates/footer.php' ?>
<!-- Fin Footer -->


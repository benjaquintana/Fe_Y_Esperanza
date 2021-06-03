<?php 
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)):
        die("Error!");
    else:
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
                            $sql = "SELECT * FROM miembros WHERE id_miembro = $id ";
                            $resultado = $conn->query($sql);
                            $info_miembro = $resultado->fetch_assoc();
                        ?>
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">

                                    <div class="text-center image_area">
                                        <img src="../img/miembros/<?php echo $info_miembro['img_miembro'] ?>"
                                            id="uploaded_image" 
                                            class="profile-user-img img-fluid img-circle uploaded_image" 
                                            alt="img_<?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?>">     
                                    </div>
                                    <h3 class="profile-username text-center"><?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?></h3>

                                    <!-- <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Followers</b> <a class="float-right">1,322</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Following</b> <a class="float-right">543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Friends</b> <a class="float-right">13,287</a>
                                        </li>
                                    </ul>

                                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Sobre Mi</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-street-view mr-1"></i></i> Biografía</strong>

                                    <p class="text-muted">
                                        <?php echo $info_miembro['descripcion'] ?>
                                    </p>

                                    <hr>

                                    <!-- <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                    <p class="text-muted">Malibu, California</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                    <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                    </p>

                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>-->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <!-- Muro -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <?php
                                                try {
                                                    $sql = "SELECT id_publicacion, img_publicacion, texto, fecha, id_miembro, nombre_miembro, apellido_miembro, img_miembro ";
                                                    $sql .= "FROM publicaciones ";
                                                    $sql .= "INNER JOIN miembros ";
                                                    $sql .= "ON publicaciones.id_miem_public = miembros.id_miembro ";
                                                    $sql .= "AND publicaciones.id_miem_public = $id ";
                                                    $sql .= "ORDER BY fecha DESC ";
                                                    $resultado = $conn->query($sql);
                                                } catch (\Exception $e) {
                                                    $error = $e->getMessage();
                                                    echo "$error";
                                                }
                                                while($publicacion = $resultado->fetch_assoc() ) { 
                                                    
                                                    $fecha = $publicacion['fecha'];
                                                    $fecha_formateada = date('d M Y - G:i', strtotime($fecha));
                                                    
                                                    if ($publicacion['img_publicacion'] == "0" ) { ?>
                                                        <div class="col-md-12">
                                                            <!-- Box Comment -->
                                                            <div class="card card-widget">
                                                                <div class="card-header">
                                                                    <div class="user-block">
                                                                        
                                                                        <img class="img-circle" src="../img/miembros/<?php echo $publicacion['img_miembro'] ?>" alt="User Image">
                                                                        <span class="username"><a href="#"><?php echo $publicacion['nombre_miembro'] . " " . $publicacion['apellido_miembro']; ?></a></span>
                                                                        <span class="description">Compartido - <?php echo $fecha_formateada ?></span>
                                                                    </div>
                                                                    <!-- /.user-block -->
                                                                    <div class="card-tools">
                                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </div>
                                                                    <!-- /.card-tools -->
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">
                                                                    <!-- post text -->
                                                                    <p><?php echo $publicacion['texto'] ?></p>
                                                                    <!-- Social sharing buttons --
                                                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                                                                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                                                                    <span class="float-right text-muted">45 likes - 2 comments</span> -->
                                                                </div>
                                                                <!-- /.card-body --
                                                                <div class="card-footer card-comments">
                                                                    <div class="card-comment">
                                                                        <!-- User image --
                                                                        <img class="img-circle img-sm" src="img/user3-128x128.jpg" alt="User Image">

                                                                        <div class="comment-text">
                                                                            <span class="username">
                                                                            Maria Gonzales
                                                                            <span class="text-muted float-right">8:03 PM Today</span>
                                                                            </span><!-- /.username --
                                                                            It is a long established fact that a reader will be distracted
                                                                            by the readable content of a page when looking at its layout.
                                                                        </div>
                                                                        <!-- /.comment-text --
                                                                    </div>
                                                                    <!-- /.card-comment --
                                                                    <div class="card-comment">
                                                                        <!-- User image --
                                                                        <img class="img-circle img-sm" src="img/user5-128x128.jpg" alt="User Image">

                                                                        <div class="comment-text">
                                                                            <span class="username">
                                                                            Nora Havisham
                                                                            <span class="text-muted float-right">8:03 PM Today</span>
                                                                            </span><!-- /.username --
                                                                            The point of using Lorem Ipsum is that it hrs a morer-less
                                                                            normal distribution of letters, as opposed to using
                                                                            'Content here, content here', making it look like readable English.
                                                                        </div>
                                                                        <!-- /.comment-text --
                                                                    </div>
                                                                    <!-- /.card-comment --
                                                                </div>
                                                                <!-- /.card-footer --
                                                                <div class="card-footer">
                                                                    <form action="#" method="post">
                                                                        <img class="img-fluid img-circle img-sm" src="img/user4-128x128.jpg" alt="Alt Text">
                                                                        <!-- .img-push is used to add margin to elements next to floating images --
                                                                        <div class="img-push">
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.card-footer -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                        <!-- /.col -->
                                                    <?php } else { ?>
                                                        <!-- Box Comment -->
                                                        <div class="col-md-12">
                                                            <div class="card card-widget">
                                                                <div class="card-header">
                                                                    <div class="user-block">
                                                                        <img class="img-circle" src="../img/miembros/<?php echo $publicacion['img_miembro'] ?>" alt="User Image">
                                                                        <span class="username"><a href="#"><?php echo $publicacion['nombre_miembro'] . " " . $publicacion['apellido_miembro'] ?></a></span>
                                                                        <span class="description">Compartido - <?php echo $fecha_formateada ?></span>
                                                                    </div>
                                                                    <!-- /.user-block -->
                                                                    <div class="card-tools">
                                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                            <i class="fas fa-minus"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </div>
                                                                    <!-- /.card-tools -->
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">
                                                                    <img class="img-fluid pad" src="../img/publicaciones/<?php echo $publicacion['img_publicacion'] ?>" alt="Photo">

                                                                    <p><?php echo $publicacion['texto'] ?></p>
                                                                    <!--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                                                                    <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                                                                    <span class="float-right text-muted">127 likes - 3 comments</span>-->
                                                                </div>
                                                                <!-- /.card-body --
                                                                <div class="card-footer card-comments">
                                                                    <div class="card-comment">
                                                                    <!-- User image --
                                                                    <img class="img-circle img-sm" src="img/user3-128x128.jpg" alt="User Image">

                                                                    <div class="comment-text">
                                                                        <span class="username">
                                                                        Maria Gonzales
                                                                        <span class="text-muted float-right">8:03 PM Today</span>
                                                                        </span><!-- /.username --
                                                                        It is a long established fact that a reader will be distracted
                                                                        by the readable content of a page when looking at its layout.
                                                                    </div>
                                                                    <!-- /.comment-text --
                                                                    </div>
                                                                    <!-- /.card-comment --
                                                                    <div class="card-comment">
                                                                        <!-- User image --
                                                                        <img class="img-circle img-sm" src="img/user4-128x128.jpg" alt="User Image">
                                                                        <div class="comment-text">
                                                                            <span class="username">
                                                                                Luna Stark
                                                                                <span class="text-muted float-right">8:03 PM Today</span>
                                                                            </span><!-- /.username --
                                                                                It is a long established fact that a reader will be distracted
                                                                                by the readable content of a page when looking at its layout.
                                                                        </div>
                                                                        <!-- /.comment-text --
                                                                    </div>
                                                                    <!-- /.card-comment --
                                                                </div>
                                                                <!-- /.card-footer --
                                                                <div class="card-footer">
                                                                    <form action="#" method="post">
                                                                        <img class="img-fluid img-circle img-sm" src="img/user4-128x128.jpg" alt="Alt Text">
                                                                        <!-- .img-push is used to add margin to elements next to floating images --
                                                                        <div class="img-push">
                                                                            <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.card-footer -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                        <!-- /.col -->
                                                    <?php } ?>
                                                <?php } ?>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
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
<?php 
    include_once 'templates/footer.php';
    endif;
?>
<!-- Fin Footer -->


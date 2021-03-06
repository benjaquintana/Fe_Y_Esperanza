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

                                    <div class="text-center image_area">
                                        <form role="form" name="guardar_registro" method="post" id="guardar_registro_archivo" action="upload.php">
                                            <label for="upload_image">
                                                <img src="../img/miembros/<?php echo $info_miembro['img_miembro'] ?>"
                                                    id="uploaded_image" 
                                                    class="profile-user-img img-fluid img-circle uploaded_image" 
                                                    alt="img_<?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?>">
                                                <div class="overlay">
                                                    <div class="text"><i class="fas fa-camera"></i></div>
                                                </div>
                                                <input type="file" name="image" class="image" id="upload_image" style="display:none">
                                            </label>
                                        </form>
                                    </div>

                                    <!-- Modal Upload Imagen -->
                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Recortar la imagen antes de subir</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="img-container">
                                                        <div class="row">
                                                            <div class="modal_image col-md-9">
                                                                <img src="" class="" id="sample_image" />
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="preview"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="crop" class="btn btn-primary">Recortar</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
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
                                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Mi Actividad</a></li>
                                        <!--<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Linea de Tiempo</a></li>-->
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar Perfil</a></li>
                                    </ul>
                                </div><!-- /.card-header -->

                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <?php
                                                $id_session = $_SESSION['id'];
                                                try {
                                                    $sql = "SELECT id_publicacion, img_publicacion, texto, fecha, id_miembro, nombre_miembro, apellido_miembro, img_miembro ";
                                                    $sql .= "FROM publicaciones ";
                                                    $sql .= "INNER JOIN miembros ";
                                                    $sql .= "ON publicaciones.id_miem_public = miembros.id_miembro ";
                                                    $sql .= "AND publicaciones.id_miem_public = $id_session ";
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

                                        <!--<div class="tab-pane" id="timeline">
                                            <!-- The timeline --
                                            <div class="timeline timeline-inverse">
                                            <!-- timeline time label --
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                10 Feb. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item --
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item --
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item --
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label --
                                            <div class="time-label">
                                                <span class="bg-success">
                                                3 Jan. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item --
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                <div class="timeline-body">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                    <img src="https://placehold.it/150x100" alt="...">
                                                </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item --
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="settings">
                                            <form action="acciones_social.php" name="registro_social_form" id="guardar_registro_editado" method="post" class="form-horizontal">
                                                <!-- Nombre -->
                                                <div class="form-group row">
                                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre" value="<?php echo $info_miembro['nombre_miembro']; ?>">
                                                    </div>
                                                </div>

                                                <!-- Apellido -->
                                                <div class="form-group row">
                                                    <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa el Apellido" value="<?php echo $info_miembro['apellido_miembro']; ?>">
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el Email" value="<?php echo $info_miembro['email_miembro']; ?>">
                                                    </div>
                                                </div>

                                                <!-- Fecha -->
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                                                    <?php
                                                        $fecha = $info_miembro['fecha_nacimiento'];
                                                        $fecha_formateada = date('m/d/Y', strtotime($fecha));
                                                    ?>
                                                    <div class="col-sm-10">
                                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" name="fecha_nacimiento" data-target="#reservationdate" data-toggle="datetimepicker" value="<?php echo $fecha_formateada; ?>">
                                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Descripción -->
                                                <div class="form-group row">
                                                    <label for="biografia" class="col-sm-2 col-form-label">Descripción</label>
                                                    <div class="col-sm-10">
                                                        <textarea id="biografia" class="form-control" rows="3" placeholder="Escribe algo sobre el miembro" name="bio_editada"><?php echo $info_miembro['descripcion']; ?></textarea>
                                                    </div>
                                                </div>

                                                <!-- Password -->
                                                <div class="form-group row">
                                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Crea el Password">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <input type="hidden" name="registro" value="actualizar">
                                                        <input type="hidden" name="id_registro" value="<?php echo $info_miembro['id_miembro']; ?>">
                                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </div>
                                            </form>
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
<?php include_once 'templates/footer.php' ?>
<!-- Fin Footer -->


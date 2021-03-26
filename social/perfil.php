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
                            $miembro = $resultado->fetch_assoc();
                        ?>
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">

                                    <div class="text-center image_area">
                                        <form role="form" name="guardar_registro" method="post" id="guardar_registro_archivo" action="upload.php">
                                            <label for="upload_image">
                                                <img src="../img/miembros/<?php echo $miembro['url_img_miembro'] ?>"
                                                    id="uploaded_image" 
                                                    class="profile-user-img img-fluid img-circle uploaded_image" 
                                                    alt="img_<?php echo $miembro['nombre_miembro'] . " " . $miembro['apellido_miembro'] ?>">
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
                                                            <div class="col-md-8">
                                                                <img src="" id="sample_image" />
                                                            </div>
                                                            <div class="col-md-4">
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
                                    <h3 class="profile-username text-center"><?php echo $miembro['nombre_miembro'] . " " . $miembro['apellido_miembro'] ?></h3>

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
                                        <?php echo $miembro['descripcion'] ?>
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
                                            <!-- Post -->
                                            <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                            </div>
                                            <!-- /.post -->

                                            <!-- Post -->
                                            <div class="post clearfix">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="img/user7-128x128.jpg" alt="User Image">
                                                <span class="username">
                                                <a href="#">Sarah Ross</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Sent you a message - 3 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <form class="form-horizontal">
                                                <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                                </div>
                                            </form>
                                            </div>
                                            <!-- /.post -->

                                            <!-- Post -->
                                            <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="img/user6-128x128.jpg" alt="User Image">
                                                <span class="username">
                                                <a href="#">Adam Jones</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                <img class="img-fluid" src="img/photo1.png" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <img class="img-fluid mb-3" src="img/photo2.png" alt="Photo">
                                                    <img class="img-fluid" src="img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                    <img class="img-fluid mb-3" src="img/photo4.jpg" alt="Photo">
                                                    <img class="img-fluid" src="img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                            </div>
                                            <!-- /.post -->
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


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
        <section class="content contenido_principal">
            <div class="container-fluid">
                <div class="row social">
                    <!-- Muro Principal -->

                    <div class="col-md-9">
                        <div class="card card-widget">
                            <?php
                                $id_session = $_SESSION['id'];
                                $sql = "SELECT * FROM miembros WHERE id_miembro = $id_session ";
                                $resultado = $conn->query($sql);
                                $info_miembro = $resultado->fetch_assoc(); 
                            ?>
                            <div class="card-header d-flex"> 
                                <div class="user-block">
                                    <img class="img-circle" src="../img/miembros/<?php echo $info_miembro['img_miembro'] ?>" alt="User Image">
                                </div>

                                <!-- Publicar Texto-->
                                <div class="col-md-6">    
                                    <a href="#publicar_texto" class="btn btn-block btn-info publicar_texto"><i class="fas fa-feather-alt"></i> <b>Publicar</b></a>
                                </div>

                                <div style="display: none;">
                                    <div id="publicar_texto">
                                        <div class="col-md-12">
                                            <div class="card card-outline card-info">
                                                <form role="form" action="acciones_publicaciones.php" id="guardar_publicacion" name="guardar_publicacion" method="post">
                                                    <div class="card-header">
                                                        <div class="user-block">
                                                            <img class="img-circle" src="../img/miembros/<?php echo $info_miembro['img_miembro'] ?>" alt="User Image">
                                                            <span class="username"><a href="mi_perfil.php"><?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?></a></span>
                                                            <span class="description">¿Qué quieres publicar? Ponlo Aquí</span>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <textarea type="text" rows="5" name="texto" class="form-control"></textarea>
                                                    </div>
                                                    <div class="card-footer">
                                                        <input type="hidden" name="id_miembro" value="<?php echo $info_miembro['id_miembro']; ?>">
                                                        <input type="hidden" name="publicar" value="texto">
                                                        <button type="submit" class="btn btn-info btn-block boton_publicar"><i class="fas fa-feather-alt"></i> <b>Publicar</b></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                    </div>
                                </div>
                                

                                <!-- Publicar Fotos -->
                                <div class="col-md-5">    
                                    <a href="#publicar_foto" class="btn btn-block btn-success publicar_foto"><i class="fas fa-camera-retro"></i> <b>Subir Foto</b></a>
                                </div>
                                
                                <div style="display: none;">
                                    <div id="publicar_foto">
                                        <div class="col-md-12">
                                            <div class="card card-outline card-info">
                                                <form role="form" name="guardar_publicacion_archivo" id="guardar_publicacion_archivo" method="post" action="acciones_publicaciones.php" enctype="multipart/form-data">
                                                    <div class="card-header">
                                                        <div class="user-block">
                                                            <img class="img-circle" src="../img/miembros/<?php echo $info_miembro['img_miembro'] ?>" alt="User Image">
                                                            <span class="username"><a href="mi_perfil.php"><?php echo $info_miembro['nombre_miembro'] . " " . $info_miembro['apellido_miembro'] ?></a></span>
                                                            <span class="description">¿Qué quieres publicar? Colocalo Aquí</span>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->

                                                    <div class="card-body">
                                                        <label for="imagen">Imagen</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                                                <label class="custom-file-label" for="imagen">Subir archivo</label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="text">Descripción</label>
                                                            <textarea type="text" rows="3" name="texto" class="form-control" placeholder="Describe tu imagen"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="card-footer">
                                                        <input type="hidden" name="id_miembro" value="<?php echo $info_miembro['id_miembro']; ?>">
                                                        <input type="hidden" name="publicar" value="foto">
                                                        <button type="submit" class="btn btn-success btn-block boton_publicar_foto"><i class="fas fa-camera-retro"></i> <b>Subir Foto</b></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Muro -->
                    <?php
                        try {
                            $sql = "SELECT id_publicacion, img_publicacion, texto, fecha, id_miembro, nombre_miembro, apellido_miembro, img_miembro ";
                            $sql .= "FROM publicaciones ";
                            $sql .= "INNER JOIN miembros ";
                            $sql .= "ON publicaciones.id_miem_public = miembros.id_miembro ";
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
                                <div class="col-md-9 pub">
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
                                                <?php if($publicacion['id_miembro'] == $id_session): ?>
                                                    <a href="#editar_texto" class="btn btn-tool editar_texto" title="Editar">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <!-- Editar Texto -->
                                                <div style="display: none;">
                                                    <div id="editar_texto">
                                                        <div class="col-md-12">
                                                            <div class="card card-outline card-info">
                                                                <form role="form" action="acciones_publicaciones.php" id="editar_publicacion" name="guardar_publicacion" method="post">
                                                                    <div class="card-header">
                                                                        <div class="user-block">
                                                                            <img class="img-circle" src="../img/miembros/<?php echo $publicacion['img_miembro'] ?>" alt="Img_<?php echo $publicacion['nombre_miembro'] . " " . $publicacion['apellido_miembro'] ?>">
                                                                            <span class="username"><a href="mi_perfil.php"><?php echo $publicacion['nombre_miembro'] . " " . $publicacion['apellido_miembro'] ?></a></span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body">
                                                                        <textarea type="text" rows="5" name="texto" class="form-control"><?php echo $publicacion['texto'] ?></textarea>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <input type="hidden" name="id_publicacion" value="<?php echo $publicacion['id_publicacion'] ?>">
                                                                        <input type="hidden" name="editar" value="texto">
                                                                        <button type="submit" class="btn btn-info btn-block boton_publicar"><i class="fas fa-feather-alt"></i> <b>Publicar</b></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.col-->
                                                    </div>
                                                </div>

                                                <?php if($publicacion['id_miembro'] == $id_session): ?>
                                                    <a href="#" data-id="<?php echo $publicacion['id_publicacion'];?>" data-tipo="publicaciones" class="btn btn-tool borrar_registro">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                <?php endif; ?>
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
                                <div class="col-md-9 pub">
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
                                                <?php if($publicacion['id_miembro'] == $id_session): ?>
                                                    <a href="#editar_foto" class="btn btn-tool editar_foto" title="Editar">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <!-- Editar Fotos -->
                                                <div style="display: none;">
                                                    <div id="editar_foto">
                                                        <div class="col-md-12">
                                                            <div class="card card-outline card-info">
                                                                <form role="form" name="editar_publicacion_archivo" id="editar_publicacion_archivo" method="post" action="acciones_publicaciones.php" enctype="multipart/form-data">
                                                                    <div class="card-header">
                                                                        <div class="user-block">
                                                                            <img class="img-circle" src="../img/miembros/<?php echo $publicacion['img_miembro'] ?>" alt="User Image">
                                                                            <span class="username"><a href="mi_perfil.php"><?php echo $publicacion['nombre_miembro'] . " " . $publicacion['apellido_miembro'] ?></a></span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-header -->

                                                                    <div class="card-body">

                                                                        <!-- Imagen Actual -->
                                                                        <div class="form-group">
                                                                            <label for="imagen">Imagen Actual</label>
                                                                            <div class="input-group">
                                                                                <img src="../img/publicaciones/<?php echo $publicacion['img_publicacion']; ?>" alt="img_publicacion" width="200">
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        <!-- Subir Imagen -->
                                                                        <label for="imagen">Nueva Imagen</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                                                                <label class="custom-file-label" for="imagen"><?php echo $publicacion['img_publicacion']; ?></label>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="text">Descripción</label>
                                                                            <textarea type="text" rows="3" name="texto" class="form-control" placeholder="Describe tu imagen"><?php echo $publicacion['texto'] ?></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer">
                                                                        <input type="hidden" name="id_publicacion" value="<?php echo $publicacion['id_publicacion'] ?>">
                                                                        <input type="hidden" name="editar" value="foto">
                                                                        <button type="submit" class="btn btn-success btn-block boton_publicar_foto"><i class="fas fa-camera-retro"></i> <b>Subir Foto</b></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.col-->
                                                    </div>
                                                </div>

                                                <?php if($publicacion['id_miembro'] == $id_session): ?>
                                                    <a href="#" data-id="<?php echo $publicacion['id_publicacion'];?>" data-tipo="publicaciones" class="btn btn-tool borrar_registro">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                <?php endif; ?>
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
<?php include_once 'templates/footer.php'?>
<!-- Fin Footer -->

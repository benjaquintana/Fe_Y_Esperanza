<?php
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)):
        die("Error!");
    else:
    // Header
    require_once 'templates/header.php';
    // Barra
    require_once 'templates/barra.php';
    // Sidebar
    require_once 'templates/navegacion.php';
?>

<!-- Editar Texto -->
<?php 
    try {
        $sql = "SELECT id_publicacion, img_publicacion, texto, fecha, id_miembro, nombre_miembro, apellido_miembro, img_miembro ";
        $sql .= "FROM publicaciones ";
        $sql .= "INNER JOIN miembros ";
        $sql .= "ON publicaciones.id_miem_public = miembros.id_miembro ";
        $sql .= "WHERE id_publicacion = $id ";
        $resultado = $conn->query($sql);
    } catch (\Exception $e) {
        $error = $e->getMessage();
        echo "$error";
    }
    $publicacion = $resultado->fetch_assoc()
?>
<?php if ($publicacion['img_publicacion'] == "0" ) { ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper clearfix">
        <!-- Main content -->
        <section class="content contenido_principal">
            <div class="container-fluid">
                <div class="edicion_texto">
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
        </section>
    </div>
<?php } else { ?>
    <!-- Editar Fotos -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper clearfix">
        <!-- Main content -->
        <section class="content contenido_principal">
            <div class="container-fluid">
                <div class="edicion_foto">
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
                                            <input type="file" class="custom-file-input" name="imagen">
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
        </section>
    </div>
<?php } ?>

<?php
    // Footer
    require_once 'templates/footer.php';
    endif;
?>
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
        $sql = "SELECT id_comentario, id_miembro, nombre_miembro, apellido_miembro, img_miembro, texto, fecha ";
        $sql .= "FROM comentarios ";
        $sql .= "INNER JOIN miembros ";
        $sql .= "ON comentarios.id_comentador = miembros.id_miembro ";
        $sql .= "WHERE id_comentario = $id ";
        $resultado = $conn->query($sql);
    } catch (\Exception $e) {
        $error = $e->getMessage();
        echo "$error";
    }
    $comentario = $resultado->fetch_assoc()
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper clearfix">
    <!-- Main content -->
    <section class="content contenido_principal">
        <div class="container-fluid">
            <!-- Editar Texto -->
            <div class="edicion_comentario">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <form class="editar_comentario" role="form" action="acciones_publicaciones.php" name="guardar_comentario" method="post">
                            <div class="card-header">
                                <div class="user-block">
                                    <img class="img-circle" src="../img/miembros/<?php echo $comentario['img_miembro'] ?>" alt="Img_<?php echo $comentario['nombre_miembro'] . " " . $comentario['apellido_miembro'] ?>">
                                    <span class="username"><a href="mi_perfil.php"><?php echo $comentario['nombre_miembro'] . " " . $comentario['apellido_miembro'] ?></a></span>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <textarea type="text" rows="5" name="texto" class="form-control"><?php echo $comentario['texto'] ?></textarea>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="editar" value="comentario">
                                <input type="hidden" name="id_comentario" value="<?php echo $comentario['id_comentario'] ?>">
                                <button type="submit" class="btn btn-info btn-block boton_publicar"><i class="fas fa-feather-alt"></i> <b>Guardar</b></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->
            </div>
    </section>
</div>

<?php
    // Footer
    require_once 'templates/footer.php';
    endif;
?>
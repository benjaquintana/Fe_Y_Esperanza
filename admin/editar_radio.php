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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Radios</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Editar Radio</h3>
                        </div>

                        <div class="card-body">
                            <?php
                                $sql = "SELECT * FROM radios WHERE id_radio = $id ";
                                $resultado = $conn->query($sql);
                                $radio = $resultado->fetch_assoc();
                            ?>
                            <!-- form start -->
                            <form role="form" name="guardar_registro" id="guardar_registro_archivo" method="post" data-tipo="radios" action="modelo_radio.php" enctype="multipart/form-data">
                                <div class="card-body has-validation">
                                    <!-- Nombre -->
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre de tu invitado" value="<?php echo $radio['nombre_radio']; ?>">
                                    </div>

                                    <!-- Link -->
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" placeholder="Ingresa el link de tu invitado" value="<?php echo $radio['link']; ?>">
                                    </div>

                                    <!-- Imagen Actual -->
                                    <div class="form-group">
                                        <label for="imagen">Imagen Actual</label>
                                        <div class="input-group">
                                            <img src="../img/radios/<?php echo $radio['url_img_radio']; ?>" alt="img<?php echo $radio['nombre_radio'] ?>" width="200">
                                        </div>
                                    </div>

                                    <!-- Imagen -->
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                                <label class="custom-file-label" for="imagen"><?php echo $radio['url_img_radio']; ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <input type="hidden" name="registro" value="actualizar">
                                        <input type="hidden" name="id_registro" value="<?php echo $radio['id_radio']; ?>">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

<?php
    // Footer
    require_once 'templates/footer.php';
    endif;
?>

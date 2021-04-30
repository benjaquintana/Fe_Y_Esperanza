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
                        <h1>Editar Páginas</h1>
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
                            <h3 class="card-title">Editar Página</h3>
                        </div>

                        <div class="card-body">
                            <?php
                                $sql = "SELECT * FROM paginas WHERE id_pagina = $id ";
                                $resultado = $conn->query($sql);
                                $pagina = $resultado->fetch_assoc();
                            ?>
                            <!-- form start -->
                            <form role="form" name="guardar_registro" id="guardar_registro_archivo" data-tipo="paginas" method="post" action="modelo_pagina.php" enctype="multipart/form-data">
                                <div class="card-body has-validation">
                                    <!-- Nombre -->
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre de tu pagina" value="<?php echo $pagina['nombre_pagina']; ?>">
                                    </div>

                                    <!-- Link -->
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" placeholder="Ingresa el link de tu pagina" value="<?php echo $pagina['link']; ?>">
                                    </div>

                                    <!-- Imagen Actual -->
                                    <div class="form-group">
                                        <label for="imagen">Imagen Actual</label>
                                        <div class="input-group">
                                            <img src="../img/paginas/<?php echo $pagina['url_img_pagina']; ?>" alt="img<?php echo $pagina['nombre_pagina'] ?>" width="200">
                                        </div>
                                    </div>

                                    <!-- Imagen -->
                                    <div class="form-group">
                                        <label for="imagen">Imagen <small>Imágenes de 1:1</small></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                                <label class="custom-file-label" for="imagen"><?php echo $pagina['url_img_pagina']; ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <input type="hidden" name="registro" value="actualizar">
                                        <input type="hidden" name="id_registro" value="<?php echo $pagina['id_pagina']; ?>">
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

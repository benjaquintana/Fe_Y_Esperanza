<?php
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
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
                        <h1>Crear Canale</h1>
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
                            <h3 class="card-title">Crear Nuevo Canal</h3>
                        </div>

                        <div class="card-body">
                            <!-- form start -->
                            <form role="form" name="guardar_registro" id="guardar_registro_archivo" method="post" action="modelo_canal.php" enctype="multipart/form-data">
                                <div class="card-body has-validation">
                                    <!-- Nombre -->
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre de tu canal">
                                    </div>

                                    <!-- Link -->
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control" id="link" name="link" placeholder="Ingresa el link de tu canal">
                                    </div>

                                    <!-- Imagen -->
                                    <div class="form-group">
                                        <label for="imagen">Imagen <small>Imágenes de 1:1</small></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                                <label class="custom-file-label" for="imagen">Subir archivo</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <input type="hidden" name="registro" value="nuevo">
                                        <button type="submit" class="btn btn-primary">Añadir</button>
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
?>

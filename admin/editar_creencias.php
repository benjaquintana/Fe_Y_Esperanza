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
                    <h1>Editar Creencias</h1>
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
                        <h3 class="card-title">Editar Creencia</h3>
                    </div>

                    <div class="card-body">
                        <?php
                            $sql = "SELECT * FROM creencias WHERE id_creencia = $id ";
                            $resultado = $conn->query($sql);
                            $creencia = $resultado->fetch_assoc();
                        ?>
                        <!-- form start -->
                        <form role="form" name="guardar_registro" id="guardar_registro" data-tipo="creencias" method="post" action="modelo_creencias.php">
                            <div class="card-body">
                                <!-- Nombre -->
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre Completo" value="<?php echo $creencia['nombre']; ?>">
                                </div>

                                <!-- Doctrina -->
                                <div class="form-group">
                                    <label>Seleccione a que doctrina pertenece</label>
                                    <select class="custom-select" name="doctrina" required>
                                        <option value="">-- Seleccione una Doctrina --</option>
                                        <option value="Dios">Dios</option>
                                        <option value="Naturaleza del Hombbre">Natruraleza del Hombre</option>
                                        <option value="Salvacion">Salvacion</option>
                                        <option value="Iglesia">Iglesia</option>
                                        <option value="Conducta Cristiana">Conducta Cristiana</option>
                                        <option value="Acontecimientos Finales">Acontecimientos Finales</option>
                                    </select>
                                </div>

                                <!-- Icono -->
                                <div class="form-group">
                                    <label for="apellido">Icono</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <div class="input-group-text" data-toggle="tooltip">
                                                <i id="IconPreview" class="fas fa-search"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="IconInput" name="icono" placeholder="fa-icon" value="<?php echo $creencia['icono']; ?>">
                                        <button class="boton_iconos" type="button" id="GetIconPicker" data-iconpicker-input="input#IconInput" data-iconpicker-preview="i#IconPreview">Seleccione icono</button>
                                    </div>
                                </div>

                                <!-- Descripción -->
                                <div class="form-group">
                                    <label for="texto">Texto</label>
                                    <textarea id="texto" class="form-control" rows="3" placeholder="Escribe sobre la Doctrina" name="texto"><?php echo $creencia['texto']; ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="hidden" name="registro" value="actualizar">
                                <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                                <button type="submit" class="btn btn-primary">Guardar</button>
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

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
                <h1>Editar Miembros</h1>
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
                <h3 class="card-title">Editar Nuevo Miembro</h3>
            </div>

            <div class="card-body">
                <?php
                    $sql = "SELECT * FROM miembros WHERE id_miembro = $id ";
                    $resultado = $conn->query($sql);
                    $miembro = $resultado->fetch_assoc();
                ?>
                <!-- form start -->
                <form role="form" name="guardar_registro" id="guardar_registro_archivo" data-tipo="miembros" method="post" action="modelo_miembro.php" enctype="multipart/form-data">
                    <div class="card-body has-validation">

                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre" value="<?php echo $miembro['nombre_miembro']; ?>">
                        </div>

                        <!-- Apellido -->
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa el Apellido" value="<?php echo $miembro['apellido_miembro']; ?>">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el Email" value="<?php echo $miembro['email_miembro']; ?>">
                        </div>

                        <!-- Fecha -->
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <?php
                                $fecha = $miembro['fecha_nacimiento'];
                                $fecha_formateada = date('m/d/Y', strtotime($fecha));
                            ?>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="fecha_nacimiento" data-target="#reservationdate" data-toggle="datetimepicker" value="<?php echo $fecha_formateada; ?>">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Imagen Actual -->
                        <div class="form-group">
                            <label for="imagen">Imagen Actual</label>
                            <div class="input-group">
                                <img src="../img/miembros/<?php echo $miembro['img_miembro']; ?>" alt="img<?php echo $miembro['nombre_miembro'] ?>" width="200">
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                    <label class="custom-file-label" for="imagen"><?php echo $miembro['img_miembro']; ?></label>
                                </div>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="form-group">
                            <label for="biografia">Descripción</label>
                            <textarea id="biografia" class="form-control" rows="3" placeholder="Escribe algo sobre el miembro" name="biografia"><?php echo $miembro['descripcion']; ?></textarea>
                        </div>

                        <!-- Nivel -->
                        <div class="form-group">
                            <label>Seleccione el Nivel del Administrador</label>
                            <select id="nivel" class="custom-select" name="nivel" required>
                                <option value="">-- Selecciona un Nivel --</option>
                                <option value="1">Completo</option>
                                <option value="2">Basico</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Crea el Password">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <input type="hidden" name="registro" value="actualizar">
                        <input type="hidden" name="id_registro" value="<?php echo $miembro['id_miembro']; ?>">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
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

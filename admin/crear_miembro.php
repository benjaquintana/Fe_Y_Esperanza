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
                <h1>Crear Miembros</h1>
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
                <h3 class="card-title">Crear Nuevo Miembro</h3>
            </div>

            <div class="card-body">
                <!-- form start -->
                <form role="form" name="guardar_registro" id="guardar_registro_archivo" method="post" action="modelo_miembro.php" enctype="multipart/form-data">
                    <div class="card-body has-validation">

                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre">
                        </div>

                        <!-- Apellido -->
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa el Apellido">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa el Email">
                        </div>

                        <!-- Fecha -->
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="fecha_nacimiento" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                    <label class="custom-file-label" for="imagen">Subir archivo</label>
                                </div>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="form-group">
                            <label for="biografia">Descripción</label>
                            <textarea id="biografia" class="form-control" rows="3" placeholder="Escribe algo sobre el miembro" name="biografia"></textarea>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Crea el Password">
                        </div>

                        <!-- Repetir Password -->
                        <div class="form-group">
                            <label for="password">Repetir Password</label>
                            <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Repite el Password">
                            <span id="resultado_password" class="help-block"></span>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <input type="hidden" name="registro" value="nuevo">
                        <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
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

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
                <h1>Crear Administradores</h1>
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
                <h3 class="card-title">Crear Nuevo Administrador</h3>
            </div>

            <div class="card-body">
                <!-- form start -->
                <form role="form" name="guardar_registro" id="guardar_registro" data-tipo="admin" method="post" action="modelo_admin.php">
                    <div class="card-body has-validation">

                        <!-- Usuario -->
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Crea el Usuario">
                        </div>

                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre Completo">
                        </div>

                        <!-- Apellido -->
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa el Apellido">
                        </div>

                        <!-- Nivel -->
                        <div class="form-group">
                            <label>Seleccione el Nivel del Administrador</label>
                            <select id="nivel" class="custom-select" name="nivel" required>
                                <option value="">-- Selecciona un Nivel --</option>
                                <option value="1">Completo</option>
                                <option value="2">Parcial</option>
                                <option value="3">Básico</option>
                            </select>
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

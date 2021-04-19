<?php
    // Sesiones
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
                        <h1>Listado de Miembros</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Maneja los miembros en esta sección</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="registro" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Nacimiento</th>
                                            <th>Imagen</th>
                                            <th>Descripción</th>
                                            <?php if($_SESSION['nivel'] <= 2): ?>
                                            <th>Acciones</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            try {
                                                $sql = "SELECT id_miembro, nombre_miembro, apellido_miembro, email_miembro, fecha_nacimiento, img_miembro, descripcion FROM miembros ";
                                                $resultado = $conn->query($sql);
                                            } catch (\Exception $e) {
                                                $error = $e->getMessage();
                                                echo "$error";
                                            }
                                            while($miembro = $resultado->fetch_assoc() ) { ?>
                                                <tr>
                                                    <td><?php echo $miembro['nombre_miembro'];?></td>
                                                    <td><?php echo $miembro['apellido_miembro'];?></td>
                                                    <td><?php echo $miembro['email_miembro'];?></td>
                                                    <td><?php echo $miembro['fecha_nacimiento'];?></td>
                                                    <td><img src="../img/miembros/<?php echo $miembro['img_miembro'];?>" alt="img_invitado" width="150px"></td>
                                                    <td><?php echo $miembro['descripcion'];?></td>
                                                    <?php if($_SESSION['nivel'] <= 2): ?>
                                                    <td>
                                                        <a href="editar_miembro.php?id=<?php echo $miembro['id_miembro']?>" class="btn bg-orange btn-flat margin editar_registro">
                                                            <i class="fa fa-pencil blanco"></i>
                                                        </a>
                                                        <a href="#" data-id="<?php echo $miembro['id_miembro'];?>" data-tipo="miembro" class="btn bg-maroon btn-flat margin borrar_registro">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Email</th>
                                            <th>Nacimiento</th>
                                            <th>Imagen</th>
                                            <th>Descripción</th>
                                            <?php if($_SESSION['nivel'] <= 2): ?>
                                            <th>Acciones</th>
                                            <?php endif; ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
    // Footer
    require_once 'templates/footer.php';
?>

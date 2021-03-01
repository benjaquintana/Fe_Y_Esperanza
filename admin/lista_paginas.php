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
                    <h1>Listado de Páginas</h1>
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
                            <h3 class="card-title">Maneje las páginas en esta sección</h3>
                        </div>
                        <!-- /.card-header -->
                    <div class="card-body">
                        <table id="registro" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Link</th>
                                    <th>Imagen</th>
                                    <?php if($_SESSION['nivel'] <= 2): ?>
                                    <th>Acciones</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    try {
                                        $sql = "SELECT * FROM paginas";
                                        $resultado = $conn->query($sql);
                                    } catch (\Exception $e) {
                                        $error = $e->getMessage();
                                        echo "$error";
                                    }
                                    while($paginas = $resultado->fetch_assoc() ) { ?>
                                        <tr>
                                            <td><?php echo $paginas['nombre_pagina'];?></td>
                                            <td><?php echo $paginas['link'];?></td>
                                            <td><img src="../img/paginas/<?php echo $paginas['url_img_pagina'];?>" alt="img_<?php echo $paginas['nombre_pagina'];?>" width="150px"></td>
                                            <?php if($_SESSION['nivel'] <= 2): ?>
                                            <td>
                                                <a href="editar_pagina.php?id=<?php echo $paginas['id_pagina']?>" class="btn bg-orange btn-flat margin editar_registro">
                                                    <i class="fa fa-pencil blanco"></i>
                                                </a>
                                                <a href="#" data-id="<?php echo $paginas['id_pagina'];?>" data-tipo="pagina" class="btn bg-maroon btn-flat margin borrar_registro">
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
                                    <th>Link</th>
                                    <th>Imagen</th>
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

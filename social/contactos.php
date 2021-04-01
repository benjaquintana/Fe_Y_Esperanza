<?php 
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    //Header
    include_once 'templates/header.php';
    //Barra
    include_once 'templates/barra.php';
    //Navegacion
    include_once 'templates/navegacion.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper clearfix">
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row social">
                <!-- Default box -->
                <div class="card card-solid"> 
                    <div class="card-body pb-0">
                        <div class="row d-flex align-items-stretch">
                        <?php
                            try {
                                $id_session = $_SESSION['id'];
                                $sql = "SELECT id_miembro, nombre_miembro, apellido_miembro, url_img_miembro FROM miembros WHERE id_miembro != $id_session ";
                                $resultado = $conn->query($sql);
                            } catch (\Exception $e) {
                                $error = $e->getMessage();
                                echo "$error";
                            }
                            while($miembro = $resultado->fetch_assoc() ) { ?>
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    
                                    <div class="card-body pt-2">
                                        <div class="row nombre_card">
                                            <div class="col-8">
                                                <h2 class="lead"><b><?php echo $miembro['nombre_miembro'] . " " . $miembro['apellido_miembro'] ?></b></h2>
                                            </div>
                                            <div class="col-4 text-center">
                                                <img src="../img/miembros/<?php echo $miembro['url_img_miembro'] ?>" alt="img_<?php echo $miembro['nombre_miembro'] . " " . $miembro['apellido_miembro'] ?>" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <!--<a href="#" class="btn btn-sm bg-teal">
                                                <i class="fas fa-comments"></i>
                                            </a>-->
                                            <a href="perfil.php?id=<?php echo $miembro['id_miembro']?>" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> Ver Perfil
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div><!-- /.card -->
                <!-- Chat -->
                <?php //include_once 'templates/chat.php'?>
                <!-- Fin Chat -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include_once 'templates/footer.php'?>
<!-- Fin Footer -->
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
        <section class="content contenido_principal">
            <div class="container-fluid">
                <div class="row social">
                    <!-- Muro Principal -->
                    <div class="col-md-9">
                        <div class="card card-widget">

                            <ul id="messages"></ul>
                            <form class id="form" action="">
                                <input id="input" autocomplete="off" /><button>Send</button>
                            </form>

                    <!-- Chat -->
                    <?php //include_once 'templates/chat.php'?>
                    <!-- Fin Chat -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<!-- Footer -->
<?php include_once 'templates/footer.php'?>
<!-- Fin Footer -->

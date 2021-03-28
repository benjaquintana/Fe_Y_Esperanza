<?php
    session_start();
    $cerrar_sesion = $_GET['cerrar_sesion'];
    if($cerrar_sesion) {
        session_destroy();
    }
    // Funciones
    require_once 'funciones/funciones.php';
    // Header
    require_once 'templates/header.php';
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../index.php" class="h1">Unidos en Fe</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Inicia Sesión Aquí</p>

                <form method="post" name="login_social_form" id="login_social" action="login_social.php">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="login_social" value="1">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

<?php
    // Footer
    require_once 'templates/footer.php';
?>

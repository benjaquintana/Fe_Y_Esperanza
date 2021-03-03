<?php
    // Funciones
    require_once 'funciones/funciones.php';
    // Header
    require_once 'templates/header.php';
?>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../index.php" class="h1">Unidos en Fe</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registrar un Nuevo Miembro</p>

                <!-- Formulario de Inscripcion -->
                <form action="acciones_registro.php" name="registro_social_form" id="guardar_registro" method="post">

                    <!-- Nombre -->
                    <div class="input-group mb-3">
                        <input required type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu Nombre">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-signature"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Apellido -->
                    <div class="input-group mb-3">
                        <input required type="apellido" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu Apellido">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-signature"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="input-group mb-3">
                        <input required type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Fecha Nacimiento -->
                    <div class="input-group mb-3 date" id="reservationdate" data-target-input="nearest">
                        <input required type="text" class="form-control datetimepicker-input" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                         <input type="password" class="form-control" id="password" name="password" placeholder="Crea el Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Password Repetido -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Repite el Password">   
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span id="resultado_password" class="help-block"></span>

                    <!-- Terminos y Registro -->
                    <div class="row">

                        <!-- Terminos -->
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input required type="checkbox" id="agreeTerms" name="term" value="agree">
                                <label for="agreeTerms">Acepto los <a href="#">Términos y Condiciones</a></label>
                            </div>
                        </div>

                        <!-- Registro -->
                        <div class="col-6">
                            <input type="hidden" name="registro" value="nuevo">
                            <button type="submit" id="crear_registro" class="btn btn-primary btn-block">Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

<?php
    // Footer
    require_once 'templates/footer.php';
?>

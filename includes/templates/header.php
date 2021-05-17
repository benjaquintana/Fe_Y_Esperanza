<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Unidos en Fe</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
 
    <?php
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
    ?>

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!-- Place favicon.ico in the root directory -->

    <!-- Theme style -->
    <link rel="stylesheet" href="social/css/adminlte.min.css">

    <!-- User style -->
    <link rel="stylesheet" href="social/css/colorbox.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
    <!-- Hero -->
    <header class="site_header">
        <div class="hero">
            <div class="contenido_header">
                <!-- Registro Radio -->
                <div class="registro_sesion">
                    <a href="social/login.php" class="boton boton_terciario inicio_sesion"><i class="fas fa-user-lock"></i> Iniciar Sesión</a>
                    <a href="social/registro.php" class="boton boton_terciario"><i class="fas fa-user-plus"></i> Registrarse</a>
                </div>
            </div>
        </div> 
    </header>

    <!-- Barra de Navegacion -->
    <div class="navegador">
        <div class="menu_movil">
            <p><i class="fas fa-bars"></i></p>
        </div>
        <nav class="navegacion_principal"> 
            <a href="/" class="dropbtn"><i class="fas fa-home"></i> Inicio</a>                
            <a href="nosotros.php" class="dropbtn"><i class="far fa-address-card"></i> Sobre Nosotros</a>                
            <a href="estaciones.php" class="dropbtn"><i class="far fa-play-circle"></i> Estaciones</a>
            <a href="ofrendas.php" class="dropbtn"><i class="fas fa-donate"></i> Ofrendas</a>                
            <a href="https://app.box.com/s/ufwqe25szifb0zg4m086nzzvf3zbbxd5" class="dropbtn"><i class="fas fa-cloud-download-alt"></i> Descargas</a>
        </nav>
    </div>
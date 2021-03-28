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

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
    <!-- Hero -->
    <header class="site_header">
        <div class="hero">
            <div class="contenido_header">
                <!-- Redes Sociales -->
                <nav class="redes_sociales">
                    <a target="_blank" href="https://www.facebook.com/feyesperanzahoy"><i class="facebook fab fa-facebook-f"></i></a>
                    <a target="_blank" href="https://twitter.com/FeyEsperanzahoy"><i class="twitter fab fa-twitter"></i></a>
                    <a target="_blank" href="https://chat.whatsapp.com/HrXdc5pqEHi7nARs6W0yJA"><i class="whatsapp fab fa-whatsapp"></i></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCXDAlDh5-ESiMluXCVdFesg"><i class="youtube fab fa-youtube"></i></a>
                    <a target="_blank" href="https://www.instagram.com/fe.y.esperanza/"><i class="instagram fab fa-instagram"></i></a>
                </nav> 
                <!-- Titulo -->
                <div class="informacion_evento">
                    <h1 class="nombre_sitio">Unidos en Fe</h1>
                    <p class="slogan">Preparando a las familias para la <span>Venida del Señor</span>.</p>
                </div>
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
            <a href="404.html" class="dropbtn"><i class="fas fa-microphone-alt"></i> Nuestros Programas</a>   
            <a href="https://checkout.square.site/buy/57VWMWQWCKW4XFET6SDFSTRM" class="dropbtn"><i class="fas fa-donate"></i> Donaciones</a>                
            <a href="https://app.box.com/s/ufwqe25szifb0zg4m086nzzvf3zbbxd5" class="dropbtn"><i class="fas fa-cloud-download-alt"></i> Descargas</a>
        </nav>
    </div>
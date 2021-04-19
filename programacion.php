<!--Header-->
<?php include_once 'includes/templates/header.php'?>
<!--Fin Header-->
    
    <!-- Mensaje del Director -->
    <div class="mensaje_director seccion">
        <section class="contenedor">
            <h2>Bienvenidos</h2>
            <div class="contenido_mensaje">
                <picture class="imagen_director">
                    <img src="img/img_director2.png" alt="imagen_director">
                </picture>
                <div class="texto_mensaje">
                    <h3>Hola mi querido amigo, mi querida amiga que nos está visitando. Proximamente estaremos cargando nuestro programacion en esta seccion. Dios te bendiga.</h3>
                    <h3>Pr. Joel Medina</h3>
                    <h3>Capellán y Evangelista</h3>                    
                </div>
            </div>
        </section>
    </div>
    
    <!-- Escucha Nuestra Radio -->
    <section class="seccion seccion_radio">
        <div class="contenedor">
            <h2>Radio en Vivo</h2>
            <?php
                try {
                    require_once('includes/funciones/db_conexion.php');
                    $sql = "SELECT link, url_img_radio FROM radios ";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            ?>
            <ul class="contenido_radio clearfix">
                <!-- Video Promocional -->
                <li>
                    <video autoplay controls controlslist="nodownload" id="video_index" poster="img/poster_radio.png">
                        <source src="video/video_radio.mp4" type="video/mp4">
                        <source src="video/video_radio.webm" type="video/webm">
                        <source src="video/video_radio.ogv" type="video/ogv">
                    </video>
                </li>
 
                <!-- Estaciones -->
                <?php while($estacion = $resultado->fetch_assoc() ) { ?>
                <li>
                    <div class="estacion">
                        <a href="#" target="_blank">
                            <img src="img/radios/<?php echo $estacion['url_img_radio']; ?>" alt="zeno_radio" title="Nuestra radio en Zeno">
                        </a>
                        <audio controls="" src="<?php echo $estacion['link']; ?>" controlslist="nodownload" class="controls"></audio>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>
    
<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->
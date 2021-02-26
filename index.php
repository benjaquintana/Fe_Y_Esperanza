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
                    <p>Hola mi querido amigo, mi querida amiga que nos está visitando. Le doy la bienvenida a ésta página donde podrá encotrar todo lo que necesite para su crecimieto y desarrollo espiritual. Ministerio Fe y Esperanza es un ministerio cristiano Adventista del Séptimo Día. Para nosotros es una bendición servir a nuestro Padre Celestial y contar con una familia en la fe como usted. Nosotros por este medio queremos ayudar a preparar a las familias que formarán parte del pueblo que verá a Dios. Aquí podrá encontrar seminarios sobre profecía, sobre el santuario, sobre la familia, evangelismo y mucho más. ¡Que Dios te bendiga!</p>
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

    <!-- Parallax -->
    <div class="inicio parallax">
        <div class="contenedor">
            <div class="contenido_inicio">
                <p>"El corazón de Dios suspira por sus hijos terrenales con un amor más fuerte que la muerte. Al dar a su Hijo nos ha vertido todo el cielo en un don."</p>
                <h3>Ellen G. White</h3>
            </div>
        </div>
    </div>

    <!-- Canales de Youtube -->
    <section class="seccion">
        <div class="contenedor">
            <h2>Nuestros Canales</h2>
            <?php
                try {
                    require_once('includes/funciones/db_conexion.php');
                    $sql = "SELECT * FROM canales ";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            ?>
            <div class="canales">
                <?php while($canales = $resultado->fetch_assoc() ) { ?>
                <div class="canal">
                    <a href="<?php echo $canales['link']; ?>"><img src="img/canales/<?php echo $canales['url_img_canal']; ?>" alt="img_<?php echo $canales['nombre_canal'] ?>"></a>
                    <p><?php echo $canales['nombre_canal']; ?></p>
                </div>
                <?php } ?> 
            </div>
            <?php
                $conn->close();
            ?>
        </div>
    </section>
    
<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->
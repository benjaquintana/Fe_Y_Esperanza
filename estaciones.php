<!--Header-->
<?php include_once 'includes/templates/header.php'?>
<!--Fin Header-->

<!-- Escucha Nuestra Radio -->
<section class="seccion seccion_radio">
        <div class="contenedor">
            <h2>Radio en Vivo</h2>
            
            <ul class="lista_estaciones">
                <?php try {
                    require_once('includes/funciones/db_conexion.php');
                    $sql = "SELECT link, url_img_radio FROM radios ";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
                
                while($estacion = $resultado->fetch_assoc() ) { ?>
                    <!-- Estaciones -->
                    <div>
                        <a href="#" target="_blank">
                            <img src="img/radios/<?php echo $estacion['url_img_radio']; ?>" alt="zeno_radio" title="Nuestra radio en Zeno">
                        </a>
                        <audio controls="" src="<?php echo $estacion['link']; ?>" controlslist="nodownload" class="controls"></audio>
                    </div>
                <?php } ?>
            </ul>
        </div>
    </section>

<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->
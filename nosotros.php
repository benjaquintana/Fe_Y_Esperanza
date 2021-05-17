<!--Header-->
<?php include_once 'includes/templates/header.php'?>
<!--Fin Header-->
    
    <section class="seccion nuestro_ministerio">
        <div class="contenedor">
            <h2>Nuestro Ministerio</h2>
            <div class="contenido_nuestro_ministerio">
                <video autoplay controls="controls" controlslist="nodownload" id="video_ministerio" poster="img/poster_radio.png">
                    <source src="video/video_ministerio.mp4" type="video/mp4">
                    <source src="video/video_ministerio.webm" type="video/webm">
                    <source src="video/video_ministerio.ogg" type="video/ogv">
                </video>
            </div>
        </div>
    </section>

    <!-- Doctrinas -->
    <section class="creencias">
        <div class="video_creencias">
            <video autoplay loop poster="img/video_doctrina.png">
                <source src="video/video_doctrina.mp4" type="video/mp4">
                <source src="video/video_doctrina.webm" type="video/webm">
                <source src="video/video_doctrina.ogv" type="video/ogv">
            </video>
        </div> 
        <!-- Fin Contenedor Video -->
        
        <div class="contenido_creencias">
            <div class="contenedor">
                <div id="creencias" class="creencias">
                    <h2>Nuestras Creencias</h2>
                    <?php try {
                        require_once('includes/funciones/db_conexion.php');
                        $sql = "SELECT * FROM creencias ";
                        $resultado = $conn->query($sql);
                    } catch (\Exception $e) {
                        $error = $e->getMessage();
                        echo "$error";
                    } ?>
                    <ul class="lista_creencias clearfix">
                        <?php while($creencia = $resultado->fetch_assoc() ) { ?>
                            <li>
                                <div class="creencia">
                                    <a class="creencia_info" href="#creencia<?php echo $invitados['id_creencia']; ?>">
                                        <p><i class="fas fa-bible"></i><br><?php echo $creencia['nombre'] ?></p>
                                    </a>
                                </div>
                            </li>

                            <div style="display: none;">
                                <div class="creencia_info" id="creencia<?php echo $invitados['id_creencia']; ?>">
                                    <div class="detalle_evento">
                                        <h3><?php echo $creencia['nombre'] ?></h3>
                                        <p><?php echo $creencia['texto'] ?></p>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="seccion">
        <div class="contenedor">
            <h2>Nuestro Equipo</h2>

            <!-- Direccion -->
            <h3>Direccion</h3>
            <div class="lista_equipo">
                <?php try {
                    require_once('includes/funciones/db_conexion.php');
                    $sql = "SELECT nombre, apellido, url_imagen, descripcion FROM equipo WHERE cargo = 'directivo' ORDER BY id_equipo ASC ";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                    echo "$error";
                }

                while($equipo = $resultado->fetch_assoc() ) { ?>
                    <div class="card_equipo">
                        <img class="img_equipo" src="img/direc_locutores/<?php echo $equipo['url_imagen'] ?>" alt="img_<?php echo $equipo['nombre'] ?>">
                        <div>
                            <p><b><?php echo $equipo['nombre'] . " " . $equipo['apellido']; ?></b></p>
                            <p><?php echo $equipo['descripcion']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Locutores -->
            <h3>Locutores</h3>
            <div class="lista_equipo">
                <?php try {
                    require_once('includes/funciones/db_conexion.php');
                    $sql = "SELECT nombre, apellido, url_imagen, descripcion FROM equipo WHERE cargo = 'locutor' ORDER BY id_equipo ASC ";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                    echo "$error";
                }
                
                while($equipo = $resultado->fetch_assoc() ) { ?>
                    <div class="card_equipo">
                        <img class="img_equipo" src="img/direc_locutores/<?php echo $equipo['url_imagen'] ?>" alt="img_<?php echo $equipo['nombre'] ?>">
                        <div>
                            <p><b><?php echo $equipo['nombre'] . " " . $equipo['apellido']; ?></b></p>
                            <p><?php echo $equipo['descripcion']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
           
        </div>
    </section>
    
<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->

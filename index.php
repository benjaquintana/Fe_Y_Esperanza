<!--Header-->
<?php include_once 'includes/templates/header.php'?>
<!--Fin Header-->
    
    <!-- Mensaje del Director -->
    <div class="mensaje_director seccion">
        <section class="contenedor">
            <h2>Bienvenidos</h2>
            <div class="contenido_mensaje">
                <picture class="imagen_director">
                    <img src="img/img_bienvenida.jpeg" alt="img_bienvenida">
                </picture>
                <div class="texto_mensaje">
                    <p>Hola mi querido amigo, mi querida amiga que nos está visitando. Le damos la bienvenida a ésta página donde podrá encotrar todo lo que necesite para su crecimieto y desarrollo espiritual. Ministerio Fe y Esperanza es un ministerio cristiano Adventista del Séptimo Día. Para nosotros es una bendición servir a nuestro Padre Celestial y contar con una familia en la fe como usted.</p>
                    <p>Nosotros por este medio queremos ayudar a preparar a las familias que formarán parte del pueblo que verá a Dios. Aquí podrá encontrar seminarios sobre profecía, sobre el santuario, sobre la familia, evangelismo y una red social para hacer amigos para la eternidad. ¡Que Dios te bendiga!</p>
                    <h3>Equipo de Radio Fe y Esperanza</h3>                    
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
                    $estacion = $resultado->fetch_assoc();
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
                <li>
                    <div class="estacion">
                        <a href="#" target="_blank">
                            <img src="img/radios/<?php echo $estacion['url_img_radio']; ?>" alt="zeno_radio" title="Nuestra radio en Zeno">
                        </a>
                        <audio controls="" src="<?php echo $estacion['link']; ?>" controlslist="nodownload" class="controls"></audio>
                    </div>
                </li>
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
        </div>
    </section>

    <!-- Muro -->
    <!-- Content Wrapper. Contains page content -->
    <div class="seccion contenedor clearfix">
        <h2>Publicaciones</h2>
        <!-- Main content -->
        <section class="content contenido_principal">
            
            <div class="container-fluid">
                <?php
                    
                    try {
                        $sql = "SELECT id_publicacion, img_publicacion, texto, fecha, id_miembro, nombre_miembro, apellido_miembro, img_miembro ";
                        $sql .= "FROM publicaciones ";
                        $sql .= "INNER JOIN miembros ";
                        $sql .= "ON publicaciones.id_miem_public = miembros.id_miembro ";
                        $sql .= "ORDER BY fecha DESC ";
                        $resultado = $conn->query($sql);
                    } catch (\Exception $e) {
                        $error = $e->getMessage();
                        echo "$error";
                    }
                    while ($publicacion = $resultado->fetch_assoc() ) { 

                        $fecha = $publicacion['fecha'];
                        $fecha_formateada = date('d M Y - G:i', strtotime($fecha));
                        
                        if ($publicacion['img_publicacion'] == "0" ) { ?>
                            <div class="seccion pub">
                                <!-- Box Comment -->
                                <div class="card contenedor card-widget">
                                    <div class="card-header">
                                        <div class="user-block">
                                            <img class="img-circle" src="img/miembros/<?php echo $publicacion['img_miembro'] ?>" alt="User Image">
                                            <span class="username"><a href="#"><?php echo $publicacion['nombre_miembro'] . " " . $publicacion['apellido_miembro']; ?></a></span>
                                            <span class="description">Compartido - <?php echo $fecha_formateada ?></span>
                                        </div>
                                        <!-- /.user-block -->
                                        
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- post text -->
                                        <p><?php echo $publicacion['texto'] ?></p>
                                        <!-- Social sharing buttons --
                                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                                        <span class="float-right text-muted">45 likes - 2 comments</span> -->
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer card-comments">
                                        <!--Comentarios-->
                                        <?php
                                            $id_publicacion = $publicacion['id_publicacion'];
                                            try {
                                                $sql = "SELECT id_comentario, id_miembro, nombre_miembro, apellido_miembro, img_miembro, texto, fecha ";
                                                $sql .= "FROM comentarios ";
                                                $sql .= "INNER JOIN miembros ";
                                                $sql .= "ON comentarios.id_comentador = miembros.id_miembro ";
                                                $sql .= "WHERE id_publicacion = $id_publicacion ";
                                                $sql .= "ORDER BY fecha ASC ";
                                                $resultado_comentario = $conn->query($sql);
                                            } catch (\Exception $e) {
                                                $error = $e->getMessage();
                                                echo "$error";
                                            }

                                            while($comentario = $resultado_comentario->fetch_assoc() ) { ?>
                                                <div class="card-comment">
                                                    <!-- User image -->
                                                    <img class="img-circle img-sm" src="img/miembros/<?php echo $comentario['img_miembro'] ?>" alt="User Image">

                                                    <div class="comment-text">
                                                        <span class="username">
                                                            <?php echo $comentario['nombre_miembro'] . " " . $comentario['apellido_miembro'] ?>
                                                                <?php if($comentario['id_miembro'] == $id_session): ?>
                                                                    <a href="editar_comentario.php?id=<?php echo $comentario['id_comentario'] ?>" class="btn btn-tool editar_comentario">
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                    <a href="#" data-id="<?php echo $comentario['id_comentario'];?>" data-tipo="publicaciones" class="btn btn-tool borrar_comentario">
                                                                        <i class="fas fa-times"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </span>
                                                        </span><!-- /.username -->
                                                        <?php echo $comentario['texto'] ?>
                                                    </div>
                                                    <!-- /.comment-text -->
                                                </div>
                                                <!-- /.card-comment -->
                                        <?php } ?>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        <?php } else { ?>
                            <!-- Box Comment -->
                            <div class="seccion pub">
                                <div class="card contenedor card-widget">
                                    <div class="card-header">
                                        <div class="user-block">
                                            <img class="img-circle" src="img/miembros/<?php echo $publicacion['img_miembro'] ?>" alt="User Image">
                                            <span class="username"><a href="#"><?php echo $publicacion['nombre_miembro'] . " " . $publicacion['apellido_miembro'] ?></a></span>
                                            <span class="description">Compartido - <?php echo $fecha_formateada ?></span>
                                        </div>
                                        <!-- /.user-block -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <img class="img-fluid pad" src="img/publicaciones/<?php echo $publicacion['img_publicacion'] ?>" alt="Photo">

                                        <p><?php echo $publicacion['texto'] ?></p>
                                        <!--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                                        <span class="float-right text-muted">127 likes - 3 comments</span>-->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer card-comments">
                                        <!--Comentarios-->
                                        <?php
                                            $id_publicacion = $publicacion['id_publicacion'];
                                            try {
                                                $sql = "SELECT id_comentario, id_miembro, nombre_miembro, apellido_miembro, img_miembro, texto, fecha ";
                                                $sql .= "FROM comentarios ";
                                                $sql .= "INNER JOIN miembros ";
                                                $sql .= "ON comentarios.id_comentador = miembros.id_miembro ";
                                                $sql .= "WHERE id_publicacion = $id_publicacion ";
                                                $sql .= "ORDER BY fecha ASC ";
                                                $resultado_comentario = $conn->query($sql);
                                            } catch (\Exception $e) {
                                                $error = $e->getMessage();
                                                echo "$error";
                                            }

                                            while($comentario = $resultado_comentario->fetch_assoc() ) { ?>
                                                <div class="card-comment">
                                                    <!-- User image -->
                                                    <img class="img-circle img-sm" src="img/miembros/<?php echo $comentario['img_miembro'] ?>" alt="User Image">

                                                    <div class="comment-text">
                                                        <span class="username"><?php echo $comentario['nombre_miembro'] . " " . $comentario['apellido_miembro'] ?></span>
                                                        </span><!-- /.username -->
                                                        <?php echo $comentario['texto'] ?>
                                                    </div>
                                                    <!-- /.comment-text -->
                                                </div>
                                                <!-- /.card-comment -->
                                        <?php } ?>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
        $conn->close();
    ?>
    
    
<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->
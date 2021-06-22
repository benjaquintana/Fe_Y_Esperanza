<?php
    // Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $nombre = $_POST['nombre'];
    $link = $_POST['link'];
    $id_registro = $_POST['id_registro'];

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        
        /*$respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));*/
        

        //Cargar Archivo
        $directorio = "../img/canales/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . time() . ".jpg")){
            $url_imagen = time() . ".jpg";
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }

        try {
            $stmt = $conn->prepare("INSERT INTO canales (nombre_canal, link, url_img_canal, editado) VALUES (?,?,?,NOW()) ");
            $stmt->bind_param("sss", $nombre, $link, $url_imagen);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_invitado' => $id_registro,
                    'resultado_imagen' => $imagen_resultado
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }

    //Editar Canal
    if ($_POST['registro'] == 'actualizar'){
        /*$respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));*/

        //Cargar Archivo
        $directorio = "../img/canales/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . time() . ".jpg")){
            $url_imagen = time() . ".jpg";
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }

        try {
            if($_FILES['imagen']['size'] > 0 ) {
                $stmt = $conn->prepare('UPDATE canales SET nombre_canal = ?, link = ?, url_img_canal = ?, editado = NOW() WHERE id_canal = ? ');
                $stmt->bind_param("sssi", $nombre, $link, $url_imagen, $id_registro);
            } else {
                $stmt = $conn->prepare('UPDATE canales SET nombre_canal = ?, link = ?, editado = NOW() WHERE id_canal = ? ');
                $stmt->bind_param("ssi", $nombre, $link, $id_registro);
            }
            $estado = $stmt->execute();

            if($estado == true) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_canal' => $id_registro
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                );
            }
        } catch (Exception $e) {
            $respuesta = array(
              'respuesta' => $e->getMessage()
            );
        }
        die(json_encode($respuesta));
    }

    //Eliminar Radio
    if ($_POST['registro'] == 'eliminar'){
        $id_borrar = $_POST['id'];
        try {
            $stmt = $conn->prepare('DELETE FROM canales WHERE id_canal = ? ');
            $stmt->bind_param('i', $id_borrar);
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_eliminado' => $id_borrar
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        } catch (Exception $e) {
            $respuesta = array(
              'respuesta' => $e->getMessage()
            );
        }
        die(json_encode($respuesta));

    }
?>

<?php
    // Funciones
    require_once 'funciones/funciones.php';

    //Datos Comunes
    $id_miembro = $_POST['id_miembro'];
    $id_publicacion = $_POST['id_publicacion'];
    $id_comentario = $_POST['id_comentario'];
    $img_vacia = "0";
    $texto = $_POST['texto'];
    $fecha = date('Y-m-d H:i:s');

    //Publicación de Texto
    if ($_POST['publicar'] == 'texto'){
        //die(json_encode($_POST));
        try {
            $stmt = $conn->prepare("INSERT INTO publicaciones (id_miem_public, img_publicacion, texto, fecha, editado) VALUES (?,?,?,?,NOW()) ");
            $stmt->bind_param("isss", $id_miembro, $img_vacia, $texto, $fecha);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_registro' => $id_registro
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }

    //Publicacion con archivo
    if ($_POST['publicar'] == 'foto'){
        /*$respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));*/
        
        //Cargar Archivo
        $directorio = "../img/publicaciones/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . time() . ".jpg" )){
            $url_imagen = time() . ".jpg";
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }
        
        try {
            $stmt = $conn->prepare("INSERT INTO publicaciones (id_miem_public, img_publicacion, texto, fecha, editado) VALUES (?,?,?,?,NOW()) ");
            $stmt->bind_param("isss", $id_miembro, $url_imagen, $texto, $fecha);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_miembro' => $id_registro
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

    //Editar Publicacion
    if ($_POST['editar'] == 'texto'){
        //die(json_encode($_POST));

        try {
            $stmt = $conn->prepare("UPDATE publicaciones SET texto = ?, editado = NOW() WHERE id_publicacion = ? ");
            $stmt->bind_param("si", $texto, $id_publicacion);
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_publicacion' => $id_publicacion
                );
            } else {
              $respuesta = array(
                'respuesta' => 'error'
              );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }

    //Editar Publicacion con Archivo
    if ($_POST['editar'] == 'foto'){
        /*$respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));*/
        
        //Cargar Archivo
        $directorio = "../img/publicaciones/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . time() . ".jpg" )){
            $url_imagen = time() . ".jpg";
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }
        
        try {
            if($_FILES['imagen']['size'] > 0 ) {
                $stmt = $conn->prepare("UPDATE publicaciones SET img_publicacion = ?, texto = ?, editado = NOW() WHERE id_publicacion = ? ");
                $stmt->bind_param("ssi", $url_imagen, $texto, $id_publicacion);
            } else {
                $stmt = $conn->prepare("UPDATE publicaciones SET texto = ?, editado = NOW() WHERE id_publicacion = ? ");
                $stmt->bind_param("si", $texto, $id_publicacion);
            }
            
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_publicacion' => $id_publicacion
                );
            } else {
              $respuesta = array(
                'respuesta' => 'error'
              );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }

    //Eliminar Publicacion
    if ($_POST['publicacion'] == 'eliminar'){
        $id_borrar = $_POST['id'];
        try {
            $stmt = $conn->prepare('DELETE FROM publicaciones WHERE id_publicacion = ? ');
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
/*----------------------------------------------------------------------------------------------------------------------*/
    //Publicar Comentario
    if ($_POST['publicar'] == 'comentario'){
        //die(json_encode($_POST));
        try {
            $stmt = $conn->prepare("INSERT INTO comentarios (id_comentador, id_publicacion, texto, fecha, editado) VALUES (?,?,?,?,NOW()) ");
            $stmt->bind_param("iiss", $id_miembro, $id_publicacion, $texto, $fecha);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_registro' => $id_registro
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }

     //Editar Comentario
     if ($_POST['editar'] == 'comentario'){
        //die(json_encode($_POST));
        try {
            $stmt = $conn->prepare("UPDATE comentarios SET texto = ?, editado = NOW() WHERE id_comentario = ? ");
            $stmt->bind_param("si", $texto, $id_comentario);
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_publicacion' => $id_comentario
                );
            } else {
              $respuesta = array(
                'respuesta' => 'error'
              );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }

    //Eliminar Publicacion
    if ($_POST['comentario'] == 'eliminar'){
        $id_borrar = $_POST['id'];
        try {
            $stmt = $conn->prepare('DELETE FROM comentarios WHERE id_comentario = ? ');
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
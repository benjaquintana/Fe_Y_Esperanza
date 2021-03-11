<?php
    // Funciones
    require_once 'funciones/funciones.php';

    //Datos Comunes
    $id_miembro = $_POST['id_miembro'];
    $texto = $_POST['publicacion'];
    $descripcion = $_POST['descripcion'];
    $fecha = date('Y-m-d H:i:s');

    //Nuevo Usuario
    if ($_POST['publicar'] == 'texto'){

        try {
            $stmt = $conn->prepare("INSERT INTO publicaciones (id_miembro, texto, fecha) VALUES (?,?,?) ");
            $stmt->bind_param("iss", $id_miembro, $texto, $fecha);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_registro' => $id_registro
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

    //Publicacion con archivo
    if ($_POST['publicar'] == 'foto'){
        $respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));
        
        //Cargar Archivo
        $directorio = "../img/publicaciones/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . time() )){
            $url_imagen = time();
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }
        
        try {
            $stmt = $conn->prepare("INSERT INTO publicacion_imagen (id_miembro, url_imagen, descripcion, fecha) VALUES (?,?,?,?) ");
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
?>
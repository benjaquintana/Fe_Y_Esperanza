<?php
    // Funciones
    require_once 'funciones/funciones.php';

    //Datos Comunes
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $descripcion = $_POST['descripcion'];
    $cargo = $_POST['cargo'];
    $id_registro = $_POST['id_registro'];

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        /*$respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));*/
        
        //Cargar Archivo
        $directorio = "../img/direc_locutores/";
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
            $stmt = $conn->prepare("INSERT INTO equipo (nombre, apellido, url_imagen, descripcion, cargo, editado) VALUES (?,?,?,?,?,NOW()) ");
            $stmt->bind_param("sssss", $nombre, $apellido, $url_imagen, $descripcion, $cargo);
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

    //Editar Miembro
    if ($_POST['registro'] == 'actualizar'){
        /*$respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));*/
        
        //Cargar Archivo
        $directorio = "../img/direc_locutores/";
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
            if($_FILES['imagen']['size'] > 0) {
                $stmt = $conn->prepare('UPDATE equipo SET nombre = ?, apellido = ?, url_imagen = ?, descripcion = ?, cargo = ?, editado = NOW() WHERE id_equipo = ? ');
                $stmt->bind_param("sssssi", $nombre, $apellido, $url_imagen, $descripcion, $cargo, $id_registro);
            } else {
                $stmt = $conn->prepare('UPDATE equipo SET nombre = ?, apellido = ?, descripcion = ?, cargo = ?, editado = NOW() WHERE id_equipo = ? ');
                $stmt->bind_param("ssssi", $nombre, $apellido, $descripcion, $cargo, $id_registro);
            }  
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $id_registro
                );
            } else {
              $respuesta = array(
                'respuesta' => 'error'
              );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            $respuesta = array(
              'respuesta' => $e->getMessage()
            );
        }
        die(json_encode($respuesta));
    }

    //Eliminar Miembro
    if ($_POST['registro'] == 'eliminar'){
        $id_borrar = $_POST['id'];
        try {
            $stmt = $conn->prepare('DELETE FROM equipo WHERE id_equipo = ? ');
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

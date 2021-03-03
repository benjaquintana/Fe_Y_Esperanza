<?php
    // Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['fecha_nacimiento'];
    $fecha_nacimiento = date('Y-m-d', strtotime($fecha_nac));
    $biografia = $_POST['biografia'];
    $password = $_POST['password'];
    $id_registro = $_POST['id_registro'];
    $fecha = date('Y-m-d H:i:s');

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        /*$respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($password));*/
        
        //Cargar Archivo
        $directorio = "../img/miembros/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . time() . $_FILES['imagen']['name'])){
            $url_imagen = time() . $_FILES['imagen']['name'];
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }
        
        //Password Seguro
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
        
        try {
            $stmt = $conn->prepare("INSERT INTO miembro (nombre_miembro, apellido_miembro, email_miembro, password, fecha_nacimiento, url_img_miembro, descripcion, fecha_registro, editado) VALUES (?,?,?,?,?,?,?,?,NOW()) ");
            $stmt->bind_param("ssssssss", $nombre, $apellido, $email, $password_hashed, $fecha_nacimiento, $url_imagen, $biografia, $fecha);
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
        $directorio = "../img/miembros/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . time() . $_FILES['imagen']['name'])){
            $url_imagen = time() . $_FILES['imagen']['name'];
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }

        try {
            if(empty($_POST['password']) && $_FILES['imagen']['size'] == 0) {
                $stmt = $conn->prepare('UPDATE miembro SET nombre_miembro = ?, apellido_miembro = ?, email_miembro = ?, fecha_nacimiento = ?, descripcion = ?, editado = NOW() WHERE id_miembro = ? ');
                $stmt->bind_param("sssssi", $nombre, $apellido, $email, $fecha_nacimiento, $biografia, $id_registro);

            } elseif (empty($_POST['password']) && $_FILES['imagen']['size'] > 0) {
                $stmt = $conn->prepare('UPDATE miembro SET nombre_miembro = ?, apellido_miembro = ?, email_miembro = ?, fecha_nacimiento = ?, url_img_miembro = ?, descripcion = ?, editado = NOW() WHERE id_miembro = ? ');
                $stmt->bind_param("ssssssi", $nombre, $apellido, $email, $fecha_nacimiento, $url_imagen, $biografia, $id_registro);
            
            } elseif (!empty($_POST['password']) && $_FILES['imagen']['size'] == 0) {
                $opciones = array(
                    'cost' => 12
                );
                $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                $stmt = $conn->prepare('UPDATE miembro SET nombre_miembro = ?, apellido_miembro = ?, email_miembro = ?, password = ?, fecha_nacimiento = ?, descripcion = ?, editado = NOW() WHERE id_miembro = ? ');
                $stmt->bind_param("ssssssi", $nombre, $apellido, $email, $hash_password, $fecha_nacimiento, $biografia, $id_registro);
            
            } else {
                $opciones = array(
                    'cost' => 12
                );
                $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                $stmt = $conn->prepare('UPDATE miembro SET nombre_miembro = ?, apellido_miembro = ?, email_miembro = ?, password = ? fecha_nacimiento = ?, url_img_miembro = ?, descripcion = ?, editado = NOW() WHERE id_miembro = ? ');
                $stmt->bind_param("sssssssi", $nombre, $apellido, $email, $hash_password, $fecha_nacimiento, $url_imagen, $biografia, $id_registro);
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
            $stmt = $conn->prepare('DELETE FROM miembro WHERE id_miembro = ? ');
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

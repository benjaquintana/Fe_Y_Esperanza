<?php
    // Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $password = $_POST['password'];
    $id_registro = $_POST['id_registro'];
    $nivel = $_POST['nivel'];
    $fecha = date('Y-m-d H:i:s');

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

        try {
            $stmt = $conn->prepare("INSERT INTO administradores (usuario, nombre, apellido, password, editado, nivel) VALUES (?,?,?,?,NOW(),?) ");
            $stmt->bind_param("ssssi", $usuario, $nombre, $apellido, $password_hashed, $nivel);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_admin' => $id_registro
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

    //Editar Usuario
    if ($_POST['registro'] == 'actualizar'){
        try {
            if(empty($_POST['password'])) {
                $stmt = $conn->prepare('UPDATE administradores SET usuario = ?, nombre = ?, apellido = ?, editado = NOW(), nivel = ? WHERE id_admin = ? ');
                $stmt->bind_param("sssii", $usuario, $nombre, $apellido, $nivel, $id_registro);
            } else {
                $opciones = array(
                'cost' => 12
                );
                $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                $stmt = $conn->prepare('UPDATE administradores SET usuario = ?, nombre = ?, apellido = ?, password = ?, editado = NOW(), nivel = ? WHERE id_admin = ? ');
                $stmt->bind_param("ssssii", $usuario, $nombre, $apellido, $hash_password, $nivel, $id_registro);
            }
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $stmt->insert_id
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

    //Eliminar Usuario
    if ($_POST['registro'] == 'eliminar'){
        $id_borrar = $_POST['id'];
        try {
            $stmt = $conn->prepare('DELETE FROM administradores WHERE id_admin = ? ');
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

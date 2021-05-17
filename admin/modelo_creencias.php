<?php
    // Funciones
    require_once 'funciones/funciones.php';

    //Datos Comunes
    $nombre = $_POST['nombre'];
    $doctrina = $_POST['doctrina'];
    $texto = $_POST['texto'];
    $icono = $_POST['icono'];
    $id_registro = $_POST['id_registro'];

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        //die(json_encode($_POST));

        try {
            $stmt = $conn->prepare("INSERT INTO creencias (nombre, doctrina, texto, icono, editado) VALUES (?,?,?,?,NOW()) ");
            $stmt->bind_param("ssss", $nombre, $doctrina, $texto, $icono);
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
        //die(json_encode($_POST));
        try {
            $stmt = $conn->prepare('UPDATE creencias SET nombre = ?, doctrina = ?, texto = ?, icono = ?, editado = NOW() WHERE id_creencia = ? ');
            $stmt->bind_param("ssssi", $nombre, $doctrina, $texto, $icono, $id_registro);
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

    //Eliminar Usuario
    if ($_POST['registro'] == 'eliminar'){
        $id_borrar = $_POST['id'];
        try {
            $stmt = $conn->prepare('DELETE FROM creencias WHERE id_creencia = ? ');
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

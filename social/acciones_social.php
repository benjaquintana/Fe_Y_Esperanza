<?php
    // Funciones
    require_once 'funciones/funciones.php';

    //Datos Comunes
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['fecha_nacimiento'];
    $fecha_nacimiento = date('Y-m-d', strtotime($fecha_nac));
    $imagen_miembro = "user.jpg";
    $biografia = "Hola Amigos! Soy Nuevo";
    $bio_editada = $_POST['bio_editada'];
    $password = $_POST['password'];
    $fecha = date('Y-m-d H:i:s');
    $id_registro = $_POST['id_registro'];
    $nivel = 2;

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        //die(json_encode($_POST));

        //Password Seguro
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
        
        try {
            $stmt = $conn->prepare("INSERT INTO miembros (nombre_miembro, apellido_miembro, email_miembro, password, fecha_nacimiento, img_miembro, descripcion, fecha_registro, editado, nivel) VALUES (?,?,?,?,?,?,?,?,NOW(),?) ");
            $stmt->bind_param("ssssssssi", $nombre, $apellido, $email, $password_hashed, $fecha_nacimiento, $imagen_miembro, $biografia, $fecha, $nivel);
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

    //Editar Usuario
    if ($_POST['registro'] == 'actualizar'){
        // Sesión
        require_once 'funciones/sesiones.php';
        $id_session = $_SESSION['id'];
        //die(json_encode($_POST));
        try {
            if(empty($_POST['password'])) {
                $stmt = $conn->prepare('UPDATE miembros SET nombre_miembro = ?, apellido_miembro = ?, email_miembro = ?, fecha_nacimiento = ?, descripcion = ?, editado = NOW(), WHERE id_miembro = ? ');
                $stmt->bind_param("sssssi", $nombre, $apellido, $email, $fecha_nacimiento, $bio_editada, $id_registro);
            } else {
                $opciones = array(
                    'cost' => 12
                );
                $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                $stmt = $conn->prepare('UPDATE miembros SET nombre_miembro = ?, apellido_miembro = ?, email_miembro = ?, password = ?, fecha_nacimiento = ?, descripcion = ?, editado = NOW() WHERE id_miembro = ? ');
                $stmt->bind_param("ssssssi", $nombre, $apellido, $email, $hash_password, $fecha_nacimiento, $bio_editada, $id_registro);
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
?>

<?php 
    //Actualizar No Leidos
    if ($_POST['actualizar'] == 'no_leidos') {
        // Sesión
        require_once 'funciones/sesiones.php';
        $id_session = $_SESSION['id'];
        try {
            $sql = "SELECT COUNT(id_chat) AS no_leidos FROM chat WHERE id_reciever = $id_session AND estado = 1 ";
            $resultado = $conn->query($sql);
            $no_leidos = $resultado->fetch_assoc();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($no_leidos));
    }
?>
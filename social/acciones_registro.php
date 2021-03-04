<?php
// Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['fecha_nacimiento'];
    $fecha_nacimiento = date('Y-m-d', strtotime($fecha_nac));
    $url_imagen = "user.jpg";
    $biografia = "Hola Amigos! Soy Nuevo";
    $password = $_POST['password'];
    $fecha = date('Y-m-d H:i:s');
    $id_registro = $_POST['id_registro'];
    $sesion_actual = "0";
    $on_line = "0";

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        
        //Password Seguro
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
        
        try {
            $stmt = $conn->prepare("INSERT INTO miembros (nombre_miembro, apellido_miembro, email_miembro, password, fecha_nacimiento, url_img_miembro, descripcion, sesion_actual, on_line, fecha_registro, editado) VALUES (?,?,?,?,?,?,?,?,?,?,NOW()) ");
            $stmt->bind_param("sssssssiis", $nombre, $apellido, $email, $password_hashed, $fecha_nacimiento, $url_imagen, $biografia, $sesion_actual, $on_line, $fecha);
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
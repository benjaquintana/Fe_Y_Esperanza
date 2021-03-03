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
    $biografia = "Hola Mundo!";
    $password = $_POST['password'];
    $fecha = date('Y-m-d H:i:s');
    $id_registro = $_POST['id_registro'];

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        
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
?>
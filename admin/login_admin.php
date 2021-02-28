<?php
    //Login
    if (isset($_POST['login_admin'])) {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $password = $_POST['password'];
        $id_registro = $_POST['id_registro'];
        try {
            include_once 'funciones/funciones.php';
            $stmt = $conn->prepare("SELECT * FROM administradores WHERE usuario = ? ");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $apellido_admin, $password_admin, $editado, $nivel);
            if($stmt->affected_rows) {
                $existe = $stmt->fetch();
                if($existe) {
                    if(password_verify($password, $password_admin)) {
                        session_start();
                        $_SESSION['usuario'] = $usuario_admin;
                        $_SESSION['nombre'] = $nombre_admin;
                        $_SESSION['apellido'] = $apellido_admin;
                        $_SESSION['nivel'] = $nivel;
                        $respuesta = array(
                            'respuesta' => 'exitoso',
                            'usuario' => $nombre_admin . " " . $apellido_admin
                        );
                    } else {
                      $respuesta = array(
                        'respuesta' => 'error'
                      );
                    }
                } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            }
            $stmt->close;
            $conn->close;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }
?>

<?php
    //Login
    if (isset($_POST['login_social'])) {
        echo "<pre>";
            var_dump($_POST);
        echo "</pre>";
        try {
            include_once 'funciones/funciones.php';
            $stmt = $conn->prepare("SELECT * FROM miembro WHERE usuario = ? ");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $stmt->bind_result($id_miembro, $nombre_miembro, $apellido_miembro, $password_miembro, $editado, $nivel);
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

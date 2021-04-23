 <?php
    //Login
    if (isset($_POST['login_social'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        try {
            include_once 'funciones/funciones.php';
            $stmt = $conn->prepare("SELECT * FROM miembros WHERE email_miembro = ? ");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id, $nombre, $apellido, $email, $password_miembro, $nacimiento, $imagen, $biografia, $fecha, $editado, $nivel);
            if($stmt->affected_rows) {
                $existe = $stmt->fetch();
                if($existe) {
                    if(password_verify($password, $password_miembro)) {
                        session_start();
                        $_SESSION['id'] = $id;
                        $_SESSION['nombre'] = $nombre;
                        $_SESSION['apellido'] = $apellido;
                        $_SESSION['email'] = $email;
                        $_SESSION['nacimiento'] = $nacimiento;
                        $_SESSION['imagen'] = $imagen;
                        $_SESSION['descripcion'] = $biografia;
                        $_SESSION['fecha'] = $fecha;
                        $_SESSION['nivel'] = $nivel;
                        $respuesta = array(
                            'respuesta' => 'exitoso',
                            'usuario' => $nombre . " " . $apellido,
                            'session' => $_SESSION
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

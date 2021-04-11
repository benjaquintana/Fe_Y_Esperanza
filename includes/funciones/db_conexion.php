<?php
    $conn = new mysqli('localhost', 'root', 'root', 'unidosenfe');
    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>

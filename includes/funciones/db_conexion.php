<?php
    $conn = new mysqli('localhost', 'root', '', 'feyesperanza');
    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>

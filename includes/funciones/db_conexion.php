<?php
    $conn = new mysqli('db4free.net', 'feyesperanza', 'cristoviene', 'feyesperanza');
    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>

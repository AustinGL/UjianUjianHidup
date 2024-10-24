<?php 
    $conn = new mysqli('localhost', 'root', '', 'konser');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
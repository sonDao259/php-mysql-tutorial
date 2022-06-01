<?php 
    $conn = new mysqli('localhost', 'root', '', 'tutorial');
    if($conn->connect_error) {
        die('Connect failed: '.$conn->connect_error);
    }
?>
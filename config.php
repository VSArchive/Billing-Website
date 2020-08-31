<?php
    $host="127.0.0.1:3306";
    $user="vineelsai";
    $password="vineelsai73";
    $dbname="billing_website";
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
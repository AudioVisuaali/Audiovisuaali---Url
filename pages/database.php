<?php

// Mysql credentials
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Creating connection
try {
    $handler = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
    die();
}
?>

<?php

// Mysql credentials
$servername = "localhost";
$username = "audiovisuaali_url_user";
$password = "pb56RB";
$dbname = "";

// Creating connection
try {
    $handler = new PDO("mysql:host=$servername;dbname=audiovisuaali_url", $username, $password);
    // set the PDO error mode to exception
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
    die();
}
?>

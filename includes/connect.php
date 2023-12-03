<?php

$servername = "localhost";
$dbname = "library";
$username = "root";
$pass = "";

try {
    
    $con = new PDO("mysql:host=$servername;dbname=$dbname;",$username, $pass);

    // echo "connection success";

$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
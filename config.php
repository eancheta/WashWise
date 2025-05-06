<?php

$host = "mydatabaseserverinwashwise.mysql.database.azure.com";
$user = "washwise";
$password = "admin1234@";
$database = "newtest";
$ssl_cert_path = __DIR__ . "/certs/DigiCertGlobalRootCA.crt.pem";

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $ssl_cert_path, NULL, NULL);

if (!mysqli_real_connect($conn, $host, $user, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connection error: " . mysqli_connect_error());
}

/*
$host = "localhost";
 $user = "root";
 $password = "";
 $database = "washwise";
 $database = "test";
 
 $conn = new mysqli($host, $user, $password, $database);
 if ($conn->connect_error) { 
     die("Connecttion failed: ". $conn->connect_error);
 }
 */
?>
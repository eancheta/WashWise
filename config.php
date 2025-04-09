<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "test";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) { 
    die("Connecttion failed: ". $conn->connect_error);
}

?>
<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "washwise";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) { 
    die("Connecttion failed: ". $conn->connect_error);
}

?>
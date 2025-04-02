<?php

session_start();
require_once 'config.php';

if (isset($_POST['register'])){
    $username = $_POST['usern'];
    $password = password_hash ($_POST['passw'], PASSWORD_DEFAULT);
    $address = $_POST['add'];
    $contact = $_POST['cont'];
    $role = $_POST['rol'];

    $cheackuser = $conn->query("SELECT user FROM washwiseaccounts WHERE user = '$username'");
    if ($cheackuser->num_rows > 0){

        $_SESSION['register_error']='Username is already registered';
    } else{ 
        $conn->query("INSERT INTO washwiseaccounts( user, password, address, contact, role) VALUES ('$username','$password','$address','$contact','$role')");
    }

    header("Location: Login.php");
    exit();
}

?>
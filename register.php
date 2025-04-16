<?php

session_start();
require_once 'config.php';

if (isset($_POST['register'])){
    $username = $_POST['usern'];
    $password = password_hash ($_POST['passw'], PASSWORD_DEFAULT);
    $address = $_POST['add'];
    $contact = $_POST['cont'];
    $district = $_POST['rol'];

    $cheackuser = $conn->query("SELECT user FROM washwiseaccounts WHERE user = '$username'");
    if ($cheackuser->num_rows > 0){

        $_SESSION['register_error']='Username is already registered';
    } else{ 
        $conn->query("INSERT INTO washwiseaccounts( user, password, address, contact, district) VALUES ('$username','$password','$address','$contact','$district')");
    }

    header("Location: Login.php");
    exit();
}
if (isset($_POST['registerOw'])){
    $username = $_POST['usernOw'];
    $password = password_hash ($_POST['passwOw'], PASSWORD_DEFAULT);
    $address = $_POST['addOw'];
    $contact = $_POST['contOw'];
    $district = $_POST['rolOw'];

    $cheackuser = $conn->query("SELECT user FROM washwiseow WHERE user = '$username'");
    if ($cheackuser->num_rows > 0){

        $_SESSION['register_error']='Username is already registered';
    } else{ 
        $conn->query("INSERT INTO washwiseow( user, passwordOw, addressOw, contactOw, districtOw) VALUES ('$username','$password','$address','$contact','$district')");
    }

    header("Location: ownercreate.php");
    exit();
}

?>
<?php

session_start();
require_once 'config.php';

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


    $result = $conn->query("SELECT * FROM washwiseaccounts WHERE user ='$username'");
    if ($result->num_rows > 0) {
        $user= $result->fetch_assoc();
        if (password_verify($password, $user['password'])){
            $_SESSION['username']= $user['user'];
            $_SESSION['password']= $user['password'];

            if ($user['role']=== 'customer'){
            header("Location: dashboard.html");
            }else{
            header("Location: index.html");
            }
            exit();

        }
    } 

    $_SESSION['login_error']= 'Incorrect email or password';
    $_SESSION['active_form']= 'login';
    header("Location: Login.php");
    exit();
}

?>
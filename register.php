<?php
session_start();
require_once 'config.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['register'])) {
    $username = $_POST['usern'];
    $password = password_hash($_POST['passw'], PASSWORD_DEFAULT);
    $contact = $_POST['cont'];


    $stmt = $conn->prepare("SELECT user FROM washwiseaccounts WHERE user = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['register_error'] = 'Username is already registered';
    } else {
        $insert = $conn->prepare("INSERT INTO washwiseaccounts (user, password, contact) VALUES (?, ?, ?)");
        $insert->bind_param("sss", $username, $password, $contact);
        $insert->execute();
    }

    $stmt->close();
    $conn->close();

    header("Location: verificationpage.php");
    exit();
}
?>

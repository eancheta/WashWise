<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputName = $_POST['username'];
    $inputPassword = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM profileowner WHERE name = ?");
    $stmt->bind_param("s", $inputName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $storedHashedPassword = $user['passwordOw'];

        if (password_verify($inputPassword, $storedHashedPassword)) {
            // Success
            $_SESSION['username'] = $user['name'];
            $_SESSION['table'] = $user['name'];

            header("Location: ownerdash.php");
            exit();
        }
    }

    $_SESSION['login_error'] = '❌ Incorrect username or password';
    $_SESSION['active_form'] = 'login';
    header("Location: Login.php");
    exit();
}
?>

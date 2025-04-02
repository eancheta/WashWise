<?php
session_start();
$error = [
'login' => $_SESSION['login_error']??''
];
    $activeForm = $_SESSION['active_form'] ??'login';

    session_reset();

    function showError($error) {
        return !empty($error) ?"<p class= 'error_message".$error."</p>":'';
    }

    function isActiveForm($formname,$activeForm) {
        return $formname === $activeForm ? 'active' :'';
    }
?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="StyleLogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>
    <div class="navbar">
    <div class="logo">
        
    </div>
        <a href="index.html"> Home </a>
        <a href="About.HTML"> About </a>
        <a href="SignUp.php"> Sign up </a>
        <div class="log">
            <a href="Login.php"> Sign in </a></div>
        </div>
    </header>




    <section class="her">
        <div class="gh">
            <form class="form-box"  id="loginForm" method="post" action="log_in.php">
                <h1>Log in</h1>
                <div class="Input">
                    <input type="text"  placeholder="Username" name="username" required>
                    <i class='bx bxs-user-circle'></i>
                </div>

                <div class="Input">
                    <input type="text" placeholder="Password" name="password" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
                
                <div class="rem">
                    <label><input type="checkbox"> Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn0" name="login">Log in</button>
                <div class="reg">
                    <p>Don't have an account? <a href="SignUp.php">Register</a></p>
                </div>

            </form>
            <div id="message"><?= showError($error['login']); ?></div>
        </div>
    </section>


</body>
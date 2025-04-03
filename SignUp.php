<?php
session_start();
$error = [
'register' => $_SESSION['register_error']??''
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
    <link rel="stylesheet" href="StyleSignUp.css">
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
            <form class="form_reg <?= isActiveForm('register',$activeForm); ?>"id="loginForm"  method="post" action="register.php">
                <h1>Sign Up</h1>
                
                <div class="Input">
                    <input type="text"  placeholder="Username" name="usern" required>
                </div>
                <div class="Input">
                    <input type="text"  placeholder="Password" name="passw" required>
                </div>
                <div class="Input">
                    <input type="text"  placeholder="Address" name="add" required>
                </div>
                <div class="Input">
                    <input type="text"  placeholder="Contact_No" name="cont" required>
                </div>
                <div class="Input">
                    <select name="rol" required>
                        <option value="">--Select Role---</option>
                        <option value="customer">Customer</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>

                <button type="submit" class="btn0" name="register">Register</button>
                <div class="reg">
                    <p>Already have an account? <a href="Login.php">Login</a></p>
                </div>

            </form>
        
        </div>
    </section>
</body>
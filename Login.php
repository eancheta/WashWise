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

        <div class="gh" id="gh1">
            <form class="form-box"  id="loginForm" method="post" action="log_in.php">
                <h1>Login as Customer</h1>

                <div class="Input">
                    <input type="text"  placeholder="Username" name="username" required>
                    <i class='bx bxs-user-circle'></i>
                </div>

                <div class="Input">
                    <input type="password" placeholder="Password" name="password" required>
                    <i class='bx bx-lock-alt'></i>
                </div>
                
                <div class="rem">
                    <label><input type="checkbox"> Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" class="btn0" name="login">Log In</button>



                <div class="reg">
                    <p>Don't have an account? <a href="SignUp.php">Register</a></p>
                    <p>Log in as <a class="btn1" onclick="showForm('gh2')">Owner</a></p>
                </div>
            </form>  
        </div> 

        <div id="message">
            <?php 
                if (isset($_SESSION['login_error'])) {
                    $error = addslashes($_SESSION['login_error']); // Escape quotes
                    echo "<div id='popupAlert' style='
                            position: fixed;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            background-color: #f44336;
                            color: white;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                            z-index: 9999;
                            display: block;
                            min-width: 250px;
                            text-align: center;
                            '>
                            <span>$error</span><br><br>
                            <button onclick='document.getElementById(\"popupAlert\").style.display = \"none\"' style='padding: 5px 10px; border: none; background: white; color: #f44336; border-radius: 4px; cursor: pointer;'>Close</button>
                            </div>";
                    unset($_SESSION['login_error']);
                }
            ?>

        <div class="gh active" id="gh2"> 
            <form class="form-box"  id="loginForm" method="post" action="login_owner.php">
                <h1>Login as Owner</h1>

                <div class="Input">
                    <input type="text"  placeholder="Username" name="username" required>
                    <i class='bx bxs-user-circle'></i>
                </div>

                <div class="Input">
                    <input type="password" placeholder="Password" name="password" required pattern="\S{3,}">
                    <i class='bx bx-lock-alt'></i>
                </div>
                
                <div class="rem">
                    <label><input type="checkbox"> Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" class="btn0" name="loginOw">Log In</button>

                <div class="reg">
                    <p>Don't have an account? <a href="SignUp.php">Register</a></p>
                    <p>Log in as <a class="btn1" onclick="showForm('gh1')">Customer</a></p>
                </div>  
            </form>                   
        </div>
    </section>


</body>
<script>
    function showForm(formId) {
        document.querySelectorAll(".gh").forEach(form => form.classList.remove("active"));
        document.getElementById(formId).classList.add("active")
    }
</script>
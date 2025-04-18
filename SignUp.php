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

    <div class="gh active" id="gh1">
            <form class="form_reg" id="loginForm"  method="post" action="register.php">
                <h1>Customer</h1>
               
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
                        <option value="">--Select District---</option>
                        <option value="District_1">District 1</option>
                        <option value="District_2">District 2</option>
                        <option value="District_3">District 3</option>
                        <option value="District_4">District 4</option>
                        <option value="District_5">District 5</option>
                        <option value="District_6">District 6</option>
                    </select>
                </div>
 
                <button type="submit" class="btn0" name="register">Register</button>
                <div class="reg">
                    <p>Already have an account? <a href="Login.php">Login</a></p>
                </div>
 
            </form>
            <div class="button01">
        <button class="btn1" onclick="showForm('gh2')">Register as Owner</button>
        </div>
        </div>



 
        <div class="gh" id="gh2">
            <form class="form_reg" id="loginForm"  method="post" action="register.php">
                <h1>Owner</h1>               
                <div class="Input">
                    <input type="text"  placeholder="Address" name="addOw" required>
                </div>
                <div class="Input">
                    <input type="text"  placeholder="Contact_No" name="contOw" required>
                </div>
                <div class="Input">
                    <select name="rolOw" required>
                        <option value="">--Select District---</option>
                        <option value="District_1">District 1</option>
                        <option value="District_2">District 2</option>
                        <option value="District_3">District 3</option>
                        <option value="District_4">District 4</option>
                        <option value="District_5">District 5</option>
                        <option value="District_6">District 6</option>
                    </select>
                </div>
 
                <button type="submit" class="btn0" name="registerOw">Register</button>
                <div class="reg">
                    <p>Already have an account? <a href="Login.php">Login</a></p>
                </div>
 
            </form>

            <div class="button01">
        <button class="btn1" onclick="showForm('gh1')"> Register as Customer</button>
            </div>
        </div>

        

 
    </section>
</body>
<script>
    function showForm(formId) {
        document.querySelectorAll(".gh").forEach(form => form.classList.remove("active"));
        document.getElementById(formId).classList.add("active")
    }
</script>


<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Style_Customerprof.css">
    <title>Cancel Booking</title>
</head>
<body>
<header>
        <div class="logo"></div>
        <nav role="navigation">
            <div id="menuToggle">
                <input type="checkbox" id="menuCheckbox">
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="Customerprof.php">Profile</a></li>
                    <li><a href="Cancel.php">Cancel booking</a></li>
                    <li><a href="district.php">District-Based Car Wash Listing</a></li>
                    <li><a href="Login.php">Log Out</a></li>
                </ul>
            </div>
        </nav>

        <div class="user-section">
            <label class="names" style="font-size: 25px; font-weight: bold; ">
                <?= isset($_SESSION['username']) 
                    ? htmlspecialchars($_SESSION['username']) 
                    : 'Guest' ?>
            </label>
            <img src="car.png" alt="User Icon">
        </div>
    </header>

    <section>
    <div class="container">
            <div class="pro"></div>
        <button type="submit" class="btn0" name="loginOw" onclick="Edit()">Edit Profile</button>    
        </div>
    </section>

    <script>
function Edit() {
  window.location.href = "Custoedit.php";
}
</script>
</body>
</html>
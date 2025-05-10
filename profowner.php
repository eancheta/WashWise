<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Style_profowner.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>WashWise Dashboard</title>
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
                <li><a href="ownerdash.php">Home</a></li>
                <li><a href="reportpage.php">Reports</a></li>
                <li><a href="profowner.php">Profile</a></li>
                <li><a href="Login.php">Log Out</a></li>
                </ul>
            </div>
        </nav>

    </header>

    <section>
        <div class="container">
            <div class="pro"></div>
            <button type="submit" class="btn0" name="loginOw" onclick="Edit()">Edit Profile</button>   
        </div>
    </section>
</body>
<script>
function Edit() {
  window.location.href = "editown.php";
}
</script>
</html>

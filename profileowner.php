<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="profileowner.css">
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
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="Customerprof.php">Profile</a></li>
                    <li><a href="Cancel.php">Cancel booking</a></li>
                    <li><a href="district.php">District-Based Car Wash Listing</a></li>
                    <li><a href="Login.php">Log Out</a></li>
                </ul>
            </div>
        </nav>

    </header>

    <section>
        <div class="container">
            <div class="pro"></div>   
        </div>
    </section>
</body>
</html>

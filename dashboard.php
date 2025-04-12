<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_dashboard.css">
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Course</a></li>
                    <li><a href="#">Section</a></li>
                    <li><a href="#">Room</a></li>
                    <li><a href="#">Teacher</a></li>
                </ul>
            </div>
        </nav>

        <div class="user-section">
            <label class="names">
                <?= isset($_SESSION['username']) 
                    ? htmlspecialchars($_SESSION['username']) 
                    : 'Guest' ?>
            </label>
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="User Icon">
        </div>
    </header>

</body>
</html>
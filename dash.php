<?php
session_start();
include_once("config.php");

$tableName = $_POST['brand_table'] ?? $_SESSION['brand_table'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_dash.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>WashWise Dashboard</title>
</head>
<body>
<header>
    <div class="navbar">
        <div class="logo"></div>
        <a href="dashboard.php"> Home </a>
    </div>
</header>

<section>
    <div class="gh">
    <?php
    if ($tableName) {
        echo "<h2>Booking at " . htmlspecialchars($tableName) . "</h2>";
        echo "
        <form method='post' action='insert_process.php'>
            <input type='hidden' name='brand_table' value='" . htmlspecialchars($tableName) . "'>
            <input type='text' class='Input' name='name' placeholder='Name:' required><br>
            <label></label><br>
            <input type='text' class='Input' name='Brand_car' placeholder='Brand of the car:' required><br>
            <label></label><br>
            <select name='size' required>
                <option value=''>--Size of the car:---</option>
                <option value='Small'>Small</option>
                <option value='Medium'>Medium</option>
                <option value='Large'>Large</option>
            </select><br>
            <input type='text' class='Input' name='Contact' placeholder='Contact Number:' required><br>
            <label class='la'>Time Of Booking:</label><br>
            <input type='datetime-local' class='Input' id='book' name='book' required><br><br>
            <button class='save-btn' name='submit'>Book now</button>
        </form>";
    } else {
        echo "<p>Invalid access. Please choose a brand to book.</p>";
    }
    ?>
    </div>
</section>
</body>
</html>

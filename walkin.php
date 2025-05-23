<?php 
session_start();
include_once("config.php");

if (isset($_POST['brand_table'])) {
    $_SESSION['brand_table'] = $_POST['brand_table'];
}
$tableName = $_SESSION['brand_table'] ?? null;
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
        <a href="ownerdash.php"> Home </a>
    </div>
</header>

<section>
    <div class="gh">
    <?php
    if ($tableName) {
        echo "<h2>Walk in at " . htmlspecialchars($tableName) . "</h2>";
        echo "
        <form method='post' action='insert_processwalkin.php'>
            <input type='hidden' name='brand_table' value='" . htmlspecialchars($tableName) . "'>
            <input type='text' class='Input' name='name' placeholder='Name:' required><br>
            <label></label><br>
            <select name='size' required>
                <option value=''>--Vehicle Type--</option>
                <option value='HatchBack'>HatchBack</option>
                <option value='Sedan'>Sedan</option>
                <option value='MPV'>MPV</option>
                <option value='SUV'>SUV</option>
                <option value='Pickup'>Pickup</option>
                <option value='Van'>Van</option>
                <option value='Motorcycle'>Motorcycle</option>
            </select><br>
            <input type='text' class='Input' name='Contact' placeholder='Contact Number:' required><br>
            <label class='la'>Date Of Booking:</label><br>
            <input type='date' class='Input' id='book' name='book' required><br><br>
            <label class='la'>Time Of Booking:</label><br>
            <select name='time' required>
                <option value=''>--Select Time--</option>
                " . implode('', array_map(fn($t) => "<option value='$t'>$t</option>", [
                    '8:00AM','8:30AM','9:00AM','9:30AM','10:00AM','10:30AM','11:00AM','11:30AM',
                    '12:00PM','12:30PM','1:00PM','1:30PM','2:00PM','2:30PM','3:00PM','3:30PM',
                    '4:00PM','4:30PM','5:00PM','5:30PM','6:00PM','6:30PM','7:00PM','7:30PM',
                    '8:00PM','8:30PM','9:00PM','9:30PM','10:00PM','10:30PM','11:00PM','11:30PM',
                    '12:00AM','12:30AM','1:00AM','1:30AM'
                ])) . "
            </select><br>
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

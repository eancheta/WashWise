<?php
include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['brand_table'])) {
    $tableName = $_POST['brand_table'];
    echo "<h2>Add Customer to $tableName</h2>";
    echo "
    <form method='post' action='insert_process.php'>
        <input type='hidden' name='brand_table' value='$tableName'>
        <label>Name:</label><br>
        <input type='text' name='name' required><br>
        <label>Contact Number:</label><br>
        <input type='text' name='Contact' required><br>
        <label>Time Of Booking:</label><br>
        <input type='datetime-local' id='book' name='book' required><br><br>
        <button type='submit'>Insert</button>
    </form>
    ";
} else {
    echo "Invalid access.";
}
?>

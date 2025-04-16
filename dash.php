<?php
include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['brand_table'])) {
    $tableName = $_POST['brand_table'];
    echo "<h2>Add Customer to $tableName</h2>";
    echo "
    <form method='post' action='insert_process.php'>
        <input type='hidden' name='brand_table' value='$tableName'>
        <label>Name:</label><br>
        <input type='text' name='name'><br>
        <label>Email:</label><br>
        <input type='email' name='email'><br><br>
        <button type='submit'>Insert</button>
    </form>
    ";
} else {
    echo "Invalid access.";
}
?>

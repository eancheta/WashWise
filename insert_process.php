<?php
// --- insert_process.php ---
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table = $_POST["brand_table"];
    $name = $_POST["name"];
    $brandofcar = $_POST["Brand_car"];
    $Size = $_POST["size"];
    $contact = $_POST["Contact"];
    $booking = $_POST["book"];

    $sql = "INSERT INTO `$table` (name, Brand_of_The_car, Size_of_the_car, Contact_no, TimeOfBooking) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $brandofcar, $Size, $contact, $booking);

    if ($stmt->execute()) {
        echo "Successfully booked into $table!";
    } else {
        echo "Something went wrong: " . $stmt->error;
    }
} else {
    echo "Form not submitted.";
}
?>
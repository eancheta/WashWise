<?php
session_start();
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table = $_POST["brand_table"];
    $name = $_POST["name"];
    $Size = $_POST["size"];
    $contact = $_POST["Contact"];
    $booking = $_POST["book"];
    $time = $_POST["time"];

    $sql = "INSERT INTO `$table` (name, Size_of_the_car, Contact_no, TimeOfBooking, DateOfBooking) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "SQL Error: " . $conn->error;
     header("Location: ownerdash.php");
        exit();
    }

    $stmt->bind_param("sssss", $name, $Size, $contact, $time, $booking);

    if ($stmt->execute()) {
        $_SESSION['alert_type'] = "success";
        $_SESSION['alert_message'] = "Successfully added into $table!";
    } else {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "failed to add: " . $stmt->error;
    }

    header("Location: ownerdash.php");
    exit();
} else {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Form not submitted.";
    header("Location: ownerdash.php");
    exit();
}
?>

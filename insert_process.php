<?php
session_start();
include_once("config.php");

// Define a whitelist of allowed tables to prevent unauthorized table access
$allowed_tables = ['table1', 'table2', 'table3']; // Replace with actual table names

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture and sanitize inputs
    $table = $_POST["brand_table"];
    $name = trim($_POST["name"]);
    $Size = trim($_POST["size"]);
    $contact = trim($_POST["Contact"]);
    $booking = trim($_POST["book"]);
    $time = trim($_POST["time"]);

    // Validate that the table is in the whitelist
    if (!in_array($table, $allowed_tables)) {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "Invalid table selection.";
        header("Location: dashboard.php");
        exit();
    }

    // Validate and sanitize other inputs (e.g., phone number, name, etc.)
    if (empty($name) || empty($Size) || empty($contact) || empty($booking) || empty($time)) {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "All fields must be filled.";
        header("Location: dashboard.php");
        exit();
    }

    // Prepare the SQL query
    $sql = "INSERT INTO `$table` (name, Size_of_the_car, Contact_no, TimeOfBooking, DateOfBooking) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement is prepared successfully
    if ($stmt === false) {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "SQL Error: " . $conn->error;
        header("Location: dashboard.php");
        exit();
    }

    // Bind parameters to the SQL query
    $stmt->bind_param("sssss", $name, $Size, $contact, $time, $booking);

    // Execute the query and check if it is successful
    if ($stmt->execute()) {
        $_SESSION['alert_type'] = "success";
        $_SESSION['alert_message'] = "Successfully booked into $table!";
    } else {
        $_SESSION['alert_type'] = "error";
        $_SESSION['alert_message'] = "Booking failed: " . $stmt->error;
    }

    // Redirect to the dashboard
    header("Location: dashboard.php");
    exit();
} else {
    $_SESSION['alert_type'] = "error";
    $_SESSION['alert_message'] = "Form not submitted.";
    header("Location: dashboard.php");
    exit();
}
?>

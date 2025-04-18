<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table = $_POST["brand_table"];
    $name = $_POST["name"];
    $booking = $_POST["book"];
    $contact = $_POST["Contact"];
    

    $sql = "INSERT INTO `$table` (name, TimeOfBooking , Contact_no) VALUES (? , ? , ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $booking, $contact );

    if ($stmt->execute()) {
        echo "successfully book into $table!";
    } else {
        echo "went wrong: " . $stmt->error;
    }
} else {
    echo "Form not submitted.";
}
?>

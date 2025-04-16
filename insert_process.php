<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table = $_POST["brand_table"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "INSERT INTO `$table` (name, TimeOfBooking) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        echo "✅ Data inserted successfully into $table!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }
} else {
    echo "Form not submitted.";
}
?>

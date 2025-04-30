<?php
include_once("config.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table = preg_replace("/[^a-zA-Z0-9_]/", "", $_POST["cancel"]);
    $nameToDelete = $_POST["Name"];

    if (!empty($table)) {
        $sql = "DELETE FROM $table WHERE name = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $nameToDelete);
            if ($stmt->execute()) {
                $message = "✅ Record with name '" . htmlspecialchars($nameToDelete) . "' deleted from '$table'.";
            } else {
                $message = "❌ Deletion failed: " . $stmt->error;
            }
        } else {
            $message = "❌ Invalid table or SQL error: " . $conn->error;
        }
    } else {
        $message = "❌ Table name is invalid or empty.";
    }
}
?>

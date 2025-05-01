<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("config.php");

$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table = preg_replace("/[^a-zA-Z0-9_]/", "", $_POST["cancel"]);
    $nameToDelete = trim($_POST["Name"]);

    if (!empty($table) && !empty($nameToDelete)) {
        $sql = "DELETE FROM `$table` WHERE name = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $nameToDelete);
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $message = "✅ Record with name '" . htmlspecialchars($nameToDelete) . "' deleted from '$table'.";
                    $success = true;
                } else {
                    $message = "⚠️ No matching record found.";
                }
            } else {
                $message = "❌ Execute failed: " . $stmt->error;
            }
        } else {
            $message = "❌ Prepare failed: " . $conn->error;
        }
    } else {
        $message = "❌ Please enter a valid table and name.";
    }
}
?>